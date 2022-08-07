<div>

    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Testimonials</h5>
            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary float-right rounded"><i class="fas fa-plus fa-sm mr-2 text-gray-100"></i> Add testimonial</a>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Testimonial List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-5">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="flex items-center justify-between">

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
                                <label>Search:<input type="search" wire:model="search" class="ml-2" placeholder="Type here..."></label>
                            </div>
                            <div id="datatable_filter" class="dataTables_filter mr-2">
                                <label>Filter:
                                    <select wire:model="filter">
                                        <option value="">All</option>
                                        <option value="1">approved</option>
                                        <option value="0">not approved</option>
                                    </select>
                            </div>
                        </div>

                        <table class="table dataTable no-footer" id="datatable" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <td class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-sort="ascending" aria-label="No.: activate to sort column descending" wire:click="sortBy('testimonial_no')">S/N</td>

                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 900px;" aria-label="Name: activate to sort column ascending"></td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Name: activate to sort column ascending">Name</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 192px;" aria-label="Email: activate to sort column ascending">Email</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-label="Phone number: activate to sort column ascending">Review</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Rating</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Status</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Date</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 102px;" aria-label="Action: activate to sort column ascending">Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($testimonials as $testimonial)

                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ ++$index }}.</td>
                                    <td class="w-full">
                                        <img src="{{ $testimonial->profile_pic }}" class="rounded-full">

                                    </td>
                                    <td>{{ $testimonial->name }}</td>

                                    <td>{{ $testimonial->email }}</td>
                                    <td>
                                        {!! $testimonial->reviews !!}
                                    </td>
                                    <td>{{ $testimonial->rating }}</td>
                                    <td>
                                        @if($testimonial->is_approve)
                                        <span class="badge badge-green badge-pill">Approved</span>
                                        @else
                                        <span class="badge badge-red badge-pill">Not approved</span>
                                        @endif
                                    </td>
                                    <td><em><small>
                                                {{ $testimonial->created_at }}

                                            </small></em></td>
                                    <td class="td-action">
                                        <div class="flex items-center justify-between">
                                            @if ($testimonial->is_approve)
                                            <span data-toggle="tooltip" wire:click.prevent="toggleStatus({{ $testimonial->id }})" title="Disapprove {{ $testimonial->name }} reviews" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.testimonial.show', $testimonial->id) }}"><i class="fas fa-toggle-on text-green-700"></i></a>
                                            </span>
                                            @else
                                            <span data-toggle="tooltip" wire:click.prevent="toggleStatus({{ $testimonial->id }})" title="Approvie {{ $testimonial->name }} reviews" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="#"><i class="fas fa-toggle-off text-red-700"></i></a>
                                            </span>
                                            @endif
                                            <span data-toggle="tooltip" title="View {{ $testimonial->name }} reviews" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.testimonial.show', $testimonial->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                            </span>
                                            <span data-toggle="tooltip" title="Edit {{ $testimonial->name }} reviews" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.testimonial.edit', $testimonial->id) }}"><i class="fas fa-edit"></i></a>
                                            </span>

                                            <span data-toggle="tooltip" title="Delete testimonial" data-original-title="Detail">
                                                <span class="a-detail btn-detail" wire:click.prevent="destory({{ $testimonial->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" role="button"><i class="fas fa-trash-alt text-gray-600"></i></span>
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
                        {{ $testimonials->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
