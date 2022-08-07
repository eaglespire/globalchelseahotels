<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($bookingId)
    {
        // $invoice = Booking::find($bookingId);

        return view('page.invoice.index');

    }
}