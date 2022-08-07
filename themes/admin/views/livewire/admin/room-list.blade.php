<div>

    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Rooms</h5>
            <a href="{{ route('admin.room.create') }}" class="btn btn-primary float-right rounded" ><i class="fas fa-plus fa-sm mr-2 text-gray-100"></i> Add Room</a>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Room List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-5">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dataTables_length" id="datatable_length">
                              <label>Show
                                <select name="datatable_length" wire:model="enlist" aria-controls="datatable" class="">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select> entries</label>
                        </div>
                        <div id="datatable_filter" class="dataTables_filter">
                              <label>Search:<input type="search" wire:model="search" class="" placeholder="Type here..."></label>
                        </div>
                          <div id="datatable_filter" class="dataTables_filter mr-2">
                              <label>Filter:
                              <select wire:model="filter">
                                <option value="">All</option>
                                <option value="Avaliable">Avaliable</option>
                                <option value="Unavaliable">Unavaliable</option>
                              </select>
                          </div>

                        <table class="table dataTable no-footer" id="datatable" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <td class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-sort="ascending" aria-label="No.: activate to sort column descending" wire:click="sortBy('room_no')">No.</td>

                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Name: activate to sort column ascending">Room No</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 192px;" aria-label="Email: activate to sort column ascending" wire:click="sortBy('price')">Room Name</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-label="Phone number: activate to sort column ascending" wire:click="sortBy('price')">Price</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Cover Image</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending" wire:click="sortBy('no_of_people')">No of People</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">No of Bed</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Status</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Date</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 102px;" aria-label="Action: activate to sort column ascending">Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($rooms as $room)

                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ ++$index }}.</td>
                                    <td>{{ $room->room_no }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ '₦' . $room->price }}</td>
                                    <td>
                                       <img src="{{ $room->image }}" class="object-center object-center object-contain" />
                                    </td>
                                    <td>{{ $room->no_of_people }}</td>
                                    <td>{{ $room->no_of_bed }}</td>

                                    <td>
                                        @if($room->status == 'avaliable')
                                        <span class="badge badge-green badge-pill">{{ $room->status }}</span>
                                        @else
                                        <span class="badge badge-red badge-pill">{{ $room->status }}</span>
                                        @endif
                                    </td>
                                    <td><em><small>
                                                {{ $room->created_at }}

                                            </small></em></td>
                                    <td class="td-action">
                                        <div class="flex items-center justify-between">
                                        
                                        <span data-toggle="tooltip" title="View {{ $room->name }}" data-original-title="Detail">
                                            <a class="a-detail btn-detail" href="{{ route('admin.room.show', $room->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                        </span>
                                         <span data-toggle="tooltip" title="Edit {{ $room->name }}" data-original-title="Detail">
                                             <a class="a-detail btn-detail" href="{{ route('admin.room.edit', $room->id) }}"><i class="fas fa-edit"></i></a>
                                         </span>

                                        <span data-toggle="tooltip" title="Delete room" data-original-title="Detail">
                                            <span class="a-detail btn-detail" wire:click.prevent="destory({{ $room->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" role="button"><i class="fas fa-trash-alt text-gray-600"></i></span>
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
                        {{ $rooms->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
