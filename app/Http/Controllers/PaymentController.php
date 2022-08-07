<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Mail\Invoice;
use App\Models\Booking;
use App\Models\PaymentHistory;
use App\Models\Room;
use App\Models\User;
use PDF;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
        $session = new Session();
        // dd($session->get('rooms'));
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $total_cost = intval($session->get('total_cost'));
        if ($session->get('total_cost')) {
            // Enter the details of the payment

            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => $total_cost,
                'email' => $request->email,
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('callback'),
                'customer' => [
                    'email' => $request->email,
                    "phone_number" => $request->phone,
                    "name" => $request->name
                ],

                "customizations" => [
                    "title" => 'Hotel Booking',
                    "description" => "Online hotel booking",
                ],
                "meta" => [
                    "gender" => $request->gender,
                    "check_in_date" => $session->get('check_in_date'),
                    "check_out_date" => $session->get('check_out_date'),
                    "total_cost" => $total_cost,
                    "duration" => $session->get('duration'),
                    "rooms" => json_encode($session->get('rooms')),
                    "no_of_rooms" => $session->get('no_of_rooms'),
                    "no_of_adult" => $session->get('no_of_adult'),
                    "no_of_children" => $session->get('no_of_children'),
                    "booking_type" => $session->get('booking_type'),

                ]
            ];
            // dd($data);
            $payment = Flutterwave::initializePayment($data);


            if ($payment['status'] !== 'success') {
                // notify something went wrong
                return;
            }

            return redirect($payment['data']['link']);
        } else {
            return redirect(url('/'));
        }
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        //    dd($data);
        $meta = $data['data']['meta'];
        $meta['paid_amount'] = $data['data']['amount'];
        $meta['name'] = $data['data']['customer']['name'];
        $meta['email'] = $data['data']['customer']['email'];
        $meta['rooms'] = json_decode($data['data']['meta']['rooms']);
        $meta['phone_no'] = $data['data']['customer']['phone_number'];
        unset($meta['__CheckoutInitAddress']);

        // dd($meta);


        $customer = User::create([
            'name' => $meta['name'],
            'email' => $meta['email'],
            'phone_no' => $meta['phone_no']
        ]);

        $booking = Booking::create([
            'user_id' => $customer->id,
            'check_in_date_time' => $meta['check_in_date'],
            'check_out_date_time' => $meta['check_out_date'],
            'booking_type' => $meta['booking_type'],
            'duration' => $meta['duration'],
            'rooms' => $meta['rooms'],
            'no_of_adult' => $meta['no_of_adult'],
            'no_of_children' => $meta['no_of_children'],
            'no_of_rooms' => $meta['no_of_rooms'],
            'total_cost' => $meta['total_cost']
        ]);
        
        unset($meta['booking_type']);
        
        $PaymentHistory = PaymentHistory::create($meta);


        $session = new Session();

        
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the $data['data']['status'] is 'successful'
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        // dd($PaymentHistory);
        // Alert::success('Payment Successful', 'Your Payment was Successful');
        $collection = collect($booking->rooms);

        $roomId = $collection->map(function($query) {
           return json_decode($query); 
        });

        // dd($roomId);
        
        $rooms = Room::find($roomId);

        $pdf = PDF::loadView('home', compact('rooms', 'booking'));
        $session->clear();
        Mail::to($customer)->send(new Invoice($booking, $rooms));
        return $pdf->download('invoice.pdf');
        // return redirect()->route('invoice', $booking);
    }
}