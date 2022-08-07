<!doctype html>

<html>
<head>
    <title>Invoice</title>
    <script src="{{ mix('js/app.js', 'themes/frontend') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
 

        .container {
            padding: 10px;
            margin: auto;
        }

        #logo {
            width: 80px;
        }

        #top-title::after {
            clear: both;
        }

        #title {
            float: left;
        }

        #invoice-details {
            float: right;
        }

        #guest {
            font-weight: 5px;
        }

        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #f1b233;
        color: white;
        }


        
    </style>

</head>

<body>
    <div class="container lg:p-20 p-10 sm:p-15 mx-auto">
        <div class="">
            {{-- <img src="{{ asset('assets/img/logo/logo.png') }}" class="w-32" /> --}}
            <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('assets/img/logo/logo.png'))) }}" class="w-32" id="logo" />

        </div>

        <div class="mt-12 ml font-bold flex items-center justify-between" id="top-title" style="">
            <h3 id="title">RECEIPT</h3>
            
            <div class="font-normal" id="invoice-details">
                <p>Serial No: <b>00667/R</b></p>
                <p>Invoice Date: {{ $booking->created_at }}</p>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-3xl" id="guest">Guest</h2>
            <hr class="my-6" style="border: 1px solid #f1b233" />
            <p>
                Name: {{ $booking->user->name }}
            </p>

            <p>
                Email: {{ $booking->user->email }}
            </p>

            <p>
                Phone: (+234) {{ $booking->user->phone_no }}
            </p>
            <p>
                Booking ID: {{ $booking->id }}
            </p>

        </div>

        <div class="mt-12" >

            <h1 class="text-2xl mb-5">Booking Summary</h1>

            <div class='overflow-x-auto w-full'>
                <!-- Table -->
                <table id="customers" class='w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-50">
                        <tr class="text-gray-600 text-left">
                            <th class="font-semibold text-sm uppercase px-6 py-4">
                                Rooms
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4">
                                Price
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Check in Date
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Check out Date
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                No of Adult
                            </th>

                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                No of Children
                            </th>

                            {{-- <th class="font-semibold text-sm uppercase px-6 py-4">

                            </th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($rooms as $room)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="inline-flex">
                                            {{-- <img class='w-36 object-cover object-contain rounded' alt='Room' src="data:image/png;base64, {{ base64_encode(file_get_contents($room->image_url)) }}" style="width: 100px"> --}}

                                        </div>
                                        <div style="float-right">
                                            <p class="">
                                                {{ $room->name }}
                                            </p>
                                            <p class="text-gray-500 text-sm font-semibold tracking-wide">

                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="">
                                        NGN {{ $room->price }}



                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $booking->check_in_date_time }}

                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $booking->check_out_date_time }}


                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $booking->no_of_adult }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $booking->no_of_children }}
                                </td>

                            </tr>
                            
                        @endforeach

                    </tbody>

                    <tfoot>
                        <tr>
                         
                            <td colspan="5" class="text-right">
                                <b>Total : NGN {{ $booking->total_cost }}</b>

                            </td>
                        </tr>
                    </tfoot>
                </table>


            </div>

        </div>

    </div>
</body>
</html>
