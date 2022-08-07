@extends('layouts.app')

@section('title', 'Booking details')

@section('content')
    <div class="container mt-12">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Booking Details (NO - {{ $booking->id }})</h5>
            <a href="{{ route('admin.booking') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="cols-12 col-lg-4 mb-4">
                <div class="rounded-md bg-white shadow-2xl p-4">
                    <p class="text-lg font-weight-medium">
                        Guest Details
                    </p>
                    <hr class="border-4 mt-2 mb-2" style="background-color: #d4ad6c" />
                    <p class="mb-2"><span class="font-weight-medium">Name:</span> {{ $booking->user->name }}</p>
                    <p class="mb-2"><span class="font-weight-medium">Email:</span> {{ $booking->user->email }}</p>
                    <p class="mb-2"><span class="font-weight-medium">Gender:</span> {{ $booking->user->gender }}</p>
                    <p class="mb-2"><span class="font-weight-medium">Phone No:</span> {{ $booking->user->phone_no }}</p>
                </div>

                 <div class="rounded-md bg-white shadow-2xl p-4 mt-4">
                     <p class="text-lg font-weight-medium">
                         Booking Details
                     </p>
                     <hr class="border-4 mt-2 mb-2" style="background-color: #d4ad6c" />
                     <p class="mb-2"><span class="font-weight-medium">Check in Date:</span> {{ $booking->check_in_date_time }}</p>
                     <p class="mb-2"><span class="font-weight-medium">Check out Date:</span> {{ $booking->check_out_date_time }}</p>
                     <p class="mb-2"><span class="font-weight-medium">Duration (in days):</span> {{ $booking->duration }}</p>
                     <p class="mb-2"><span class="font-weight-medium">No of Adult:</span> {{ $booking->no_of_adult }}</p>
                     <p class="mb-2"><span class="font-weight-medium">No of Children:</span> {{ $booking->no_of_children }}</p>
                     <p class="mb-2"><span class="font-weight-medium">Total cost:</span> <span class="font-weight-bold" style="font-size: 20px"> NGN {{ number_format($booking->total_cost) }}</span></p>

                 </div>

            </div>

            
        <div class="cols-12 col-lg-8">
        <div class="rounded-md bg-white shadow-2xl p-4">
            <p class="text-lg font-weight-medium">
                Rooms details
            </p>
             <div class="py-4 overflow-x-auto">
                 <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                     <table class="min-w-full leading-normal">
                         <thead>
                             <tr>
                                 <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                     S/N
                                 </th>
                                 <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                     
                                 </th>
                                 <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                     Room Name
                                 </th>
                                 <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                     Room no
                                 </th>
                                 <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                     Price
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                         @php $index = 0 @endphp
                         @foreach($rooms as $room)

                             <tr>
                              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                  <p class="text-gray-900 whitespace-no-wrap text-center">
                                      {{ ++$index }}
                                  </p>
                              </td>

                                 <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                     <div class="flex items-center">
                                         <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                             <img class="w-full h-full rounded-full" src="{{ $room->image }}" alt="" />
                                         </div>
                                         <div class="ml-3">
                                             <p class="text-gray-900 whitespace-no-wrap">
                                                 
                                             </p>
                                         </div>
                                     </div>
                                 </td>
                                 <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                     <p class="text-gray-900 whitespace-no-wrap text-center">{{ $room->name }}</p>
                                 </td>
                                 <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                     <p class="text-gray-900 whitespace-no-wrap text-center">
                                         {{ $room->room_no }}
                                     </p>
                                 </td>
                                 <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                      <p class="text-gray-900 whitespace-no-wrap text-center">
                                          NGN {{ $room->price }}
                                      </p>

                                 </td>
                             </tr>
                         @endforeach
                            
                         </tbody>
                     </table>
                 </div>
             </div>


        </div>
        </div>


        </div>
    </div>
@endsection