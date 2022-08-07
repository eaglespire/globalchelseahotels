@extends('layouts.app')

@section('title', 'Newsletter Subscribers')

@section('content')
    <div class="container">
     <div class="mb-4 mt-8">
         <h5 class="title-heading d-inline-block ">Newsletter Subscribers</h5>
     </div>

       <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
           <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
               <table class="min-w-full leading-normal">
                   <thead>
                       <tr>
                           <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                               S/N
                           </th>
                           <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                               Email
                           </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Subscribed Date
                            </th>
                       </tr>
                   </thead>
                   <tbody>
                   @php $index = 0 @endphp
                   @forelse($subscribers as $subscriber)
                       <tr>
                       <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm ">
                           <p class="text-gray-900 whitespace-no-wrap text-center">
                               {{ ++$index }}
                           </p>
                       </td>

                           <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{ $subscriber->email }}
                                </p>
                           </td>
                           <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                               <p class="text-gray-900 whitespace-no-wrap text-center">
                               {{ $subscriber->created_at }}
                               </p>
                           </td>
                       </tr>
                       
                   @empty
                       <tr>
                        <td colspan="3">
                        <p class="text-center p-2">
                        NO RECORD FOUND

                        </p>
                        </td>
                       </tr>
                   @endforelse
                     
                   </tbody>

                   {{ $subscribers->links() }}
               </table>
           </div>
       </div>
    </div>
@endsection