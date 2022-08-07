<div>
    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">guests</h5>
            <div class="clearfix"></div>

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Guest List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-5">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="flex items-center justify-between">

                            <div class="dataTables_length" id="datatable_length">
                                <label>Show
                                    <select name="datatable_length" wire:model="enlist" aria-controls="datatable"
                                        class="">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select> entries</label>
                            </div>
                            <div id="datatable_filter" class="dataTables_filter">
                                <label>Search:<input type="search" wire:model="search" class="ml-2"
                                        placeholder="Type here..."></label>
                            </div>
                            <div id="datatable_filter" class="dataTables_filter mr-2">
                                <label>Filter:
                                    <select wire:model="filter">
                                        <option value="">All</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                            </div>
                        </div>

                        <table class="table dataTable no-footer" id="datatable" style="width: 100%;" role="grid"
                            aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <td class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 56px;" aria-sort="ascending"
                                        aria-label="No.: activate to sort column descending"
                                        wire:click="sortBy('guest_no')">S/N</td>

                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 162px;" aria-label="Name: activate to sort column ascending"></td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 162px;" aria-label="Name: activate to sort column ascending">Name
                                    </td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 192px;" aria-label="Email: activate to sort column ascending">
                                        Email</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 168px;"
                                        aria-label="Phone number: activate to sort column ascending">Phone no</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 162px;" aria-label="Book at: activate to sort column ascending">
                                        Gender</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 162px;" aria-label="Book at: activate to sort column ascending">
                                        Date</td>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($guests as $guest)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ ++$index }}.</td>
                                        <td>{{ $guest->name }}</td>
                                        <td>{{ $guest->email }}</td>
                                        <td>
                                            {!! $guest->phone_no !!}
                                        </td>
                                        <td>{{ $guest->gender }}</td>

                                        <td><em><small>
                                                    {{ $guest->created_at }}

                                                </small></em></td>
                                        <td class="td-action">
                                            <div class="flex items-center justify-between">
                                                <span data-toggle="tooltip" title="Delete guest"
                                                    data-original-title="Detail">
                                                    <span class="a-detail btn-detail"
                                                        wire:click.prevent="destory({{ $guest->id }})"
                                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                        role="button"><i
                                                            class="fas fa-trash-alt text-gray-600"></i></span>
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
                        {{ $guests->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
