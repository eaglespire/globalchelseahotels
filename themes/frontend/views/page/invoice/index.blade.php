<!doctype html>

<html>
<head>
    <title>Invoice</title>
    <script src="{{ mix('js/app.js', 'themes/frontend') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">

</head>

<body>
    <div class="container lg:p-20 p-10 sm:p-15 mx-auto">
        <div class="">
            <img src="{{ asset('assets/img/logo/logo.png') }}" class="w-32" />
        </div>

        <div class="mt-12 ml font-bold flex items-center justify-between">
            <h3>RECEIPT</h3>
            <div class="font-normal">
                <p>Serial No: <b>00667/R</b></p>
                <p>Invoice Date: 11/03/2021</p>
            </div>
        </div>

        <div class="mt-12">
            <h1 class="text-3xl">Guest</h1>
            <hr class="my-6" style="border: 1px solid #f1b233" />
            <p>
                Name: Guest demo
            </p>

            <p>
                Email: guest@gmail.com
            </p>

            <p>
                Phone: (+234) 08043546434
            </p>
            <p>
                Booking ID: 59388
            </p>

        </div>

        <div class="mt-12">
            <h1 class="text-2xl mb-5">Booking Summary</h1>

            <div class='overflow-x-auto w-full'>
                <!-- Table -->
                <table class='w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
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

                            <th class="font-semibold text-sm uppercase px-6 py-4">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="inline-flex">
                                        <img class='w-36 object-cover object-contain rounded' alt='Room' src="{{ asset('assets/img/rooms/room1.jpg') }}">
                                    </div>
                                    <div>
                                        <p class="">
                                            Classic Bed Room
                                        </p>
                                        <p class="text-gray-500 text-sm font-semibold tracking-wide">

                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="">
                                    ₦ 5,000
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                April 3rd 2021
                            </td>
                            <td class="px-6 py-4 text-center">
                                April 12th 2021

                            </td>

                            <td class="px-6 py-4 text-center">
                                3
                            </td>

                            <td class="px-6 py-4 text-center">
                                0
                            </td>

                        </tr>

                    </tbody>

                    <tfooter>
                        <tr>
                            <td class="pt-4 pb-2">
                                <a href="" class="p-2 px-2 bg-red-400 text-white rounded-lg">
                                    Download PDF
                                </a>
                            </td>
                            <td colspan="5" class="text-right">
                                <b>Total : ₦ 12,000</b>

                            </td>
                        </tr>
                    </tfooter>
                </table>



            </div>

        </div>

    </div>
</body>
</html>
