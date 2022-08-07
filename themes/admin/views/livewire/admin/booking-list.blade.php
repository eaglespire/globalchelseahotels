<div>

    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Bookings</h5>
            <a href="{{ route('admin.booking.create') }}" class="btn btn-primary float-right rounded"><i class="fas fa-plus fa-sm mr-2 text-gray-100"></i> New Booking</a>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Booking List</h3>
            </div>
            <div class="card-body">
             <div class="mb-4">
                    <label><i class="fas fa-filter fa-sm mr-2"></i>Filter by Date</label>
                    <br>
                    <input type="date" wire:model="currentDate" class="btn btn-outline-primary btn-sm px-3">
                    <button class="btn btn-outline-primary btn-sm px-3"><i class="fas fa-upload fa-sm mr-2"></i>Generate Report</button>
                </div>

                <div class="table-responsive pb-5">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show
                                <select name="datatable_length" wire:model="enlist" aria-controls="datatable" class="">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                        <div id="datatable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" wire:model="search" class="" placeholder="Type here..."></label>
                        </div>
                         <table class="table" id="datatable" style="width: 100%; font-size: .85rem;">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Booking ID</td>
                                <td>Booked_By</td>
                                <td>Check in date</td>
                                <td>Check out date</td>
                                <td>Booking type</td>
                                <td>Duration</td>
                                <td>No of Adults</td>
                                <td>No of Children</td>
                                <td>Book_Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($bookings as $booking)

                            <tr>
                                <td>{{ ++$index }}.</td>
                                <td>{{ $booking->id }}</td>
                                <td>
                                    {{ $booking->user->name }} <br />
                                    {{ $booking->user->email }}
                                </td>
                                <td>{{ $booking->check_in_date_time }}</td>
                                <td>{{ $booking->check_out_date_time }}</td>
                                <td>{{ $booking->booking_type }}</td>
                                <td>{{ $booking->duration }}</td>
                                <td>{{ $booking->no_of_adult }}</td>
                                <td>{{ $booking->no_of_children }}</td>
                                <td><small>{{ $booking->created_at }}</small></td>
                                <td>{{ $booking->status }}</td>

                                <td class="td-action">
                                    <div class="flex items-center justify-between">
                                    <span data-toggle="tooltip" title="Detail">
                                        <a class="a-detail btn-detail" href="{{ route('admin.booking.show', $booking->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                    </span>

                                     <span data-toggle="tooltip" title="Delete booking" data-original-title="Detail">
                                         <span class="a-detail btn-detail" wire:click.prevent="destory({{ $booking->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" role="button"><i class="fas fa-trash-alt text-gray-600"></i></span>
                                     </span>

                                    
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">NO RECORD FOUND</td>

                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                        {{ $bookings->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>

