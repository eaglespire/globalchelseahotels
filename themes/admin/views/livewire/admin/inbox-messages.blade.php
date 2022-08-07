<div>

    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Inbox Messages</h5>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Inbox Messages</h3>
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
                       
                       </div>

                        <table class="table dataTable no-footer" id="datatable" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <td class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-sort="ascending" aria-label="No.: activate to sort column descending" wire:click="sortBy('inbox_no')">S/N</td>

                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Name: activate to sort column ascending">Name</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 192px;" aria-label="Email: activate to sort column ascending">Email</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-label="Phone number: activate to sort column ascending">Subject</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Message</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 162px;" aria-label="Book at: activate to sort column ascending">Date</td>
                                    <td class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 102px;" aria-label="Action: activate to sort column ascending">Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($inboxes as $inbox)

                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ ++$index }}.</td>
                                    <td>
                                        {{$inbox->name}}
                                    </td>
                                    <td>{{ $inbox->email }}</td>
                                    <td>
                                    {{$inbox->subject}}
                                    </td>
                                    <td>
                                    {!! $inbox->message !!}
                                    </td>
                                   
                                    <td><em><small>
                                                {{ $inbox->created_at }}

                                            </small></em></td>
                                    <td class="td-action">
                                        <div class="flex items-center justify-between">
                                            <span data-toggle="tooltip" title="View {{ $inbox->name }} message" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.inbox.show', $inbox->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                            </span>
                                            <span data-toggle="tooltip" title="Reply {{ $inbox->name }}" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.inbox.create', $inbox->id) }}"><i class="fas fa-paper-plane"></i></a>
                                            </span>

                                            <span data-toggle="tooltip" title="Delete {{ $inbox->name }} message" data-original-title="Detail">
                                                <span class="a-detail btn-detail" wire:click.prevent="destory({{ $inbox->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" role="button"><i class="fas fa-trash-alt text-gray-600"></i></span>
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
                        {{ $inboxes->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>

