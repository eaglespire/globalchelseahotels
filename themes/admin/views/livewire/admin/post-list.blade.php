<div>
    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Blog Post</h5>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right rounded"><i class="fas fa-plus fa-sm mr-2 text-gray-100"></i> New Post</a>
            <div class="clearfix"></div>

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h6 mb-0">Blog Post</h3>
            </div>
            <div class="card-body">



                <div class="table-responsive pb-5">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">


           <div class="flex justify-between">
           
                        <div class="dataTables_length " id="datatable_length">
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

                        <table class="table" id="datatable" style="width: 100%; font-size: .85rem;">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Post title</td>
                                    <td>Cover image</td>
                                    <td>Date</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($posts as $post)

                                <tr>
                                    <td>{{ ++$index }}.</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img src="{{ $post->image }}" class="object-center object-contain w-32" />
                                    </td>
                                   
                                    <td>{{ $post->created_at }}</td>

                                    <td class="td-action">
                                        <div class="flex items-center justify-between">

                                            <span data-toggle="tooltip" title="View {{ $post->title }}" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.posts.show', $post->id) }}"><i class="fas fa-external-link-alt"></i></a>
                                            </span>
                                            <span data-toggle="tooltip" title="Edit {{ $post->title }}" data-original-title="Detail">
                                                <a class="a-detail btn-detail" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                                            </span>

                                            <span data-toggle="tooltip" title="Delete room" data-original-title="Detail">
                                                <span class="a-detail btn-detail" wire:click.prevent="destory({{ $post->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" role="button"><i class="fas fa-trash-alt text-gray-600"></i></span>
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
                    </div>
                </div>

            </div>
        </div>

    </section>


</div>
