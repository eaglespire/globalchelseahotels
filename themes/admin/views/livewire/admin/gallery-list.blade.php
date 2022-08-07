<div>
    <div class="row">
        @forelse($galleries as $gallery)
        <div class="col-6 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $gallery->image }}" class="object-contain object-center" />
                </div>
                <div class="card-footer">
                    <b>Uploaded : </b> <small>{{ $gallery->created_at }}</small>
                    <span role="button" wire:click.prevent="destroy({{ $gallery->id }})" data-toggle="tooltip" title="Delete Photo" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" data-original-title="Detail" class="ml-10"><i class="fas fa-trash"></i></span>


                </div>
            </div>
        </div>
        @empty
        @endforelse

        <div class="cols-12 mt-3">
        
            {{ $galleries->links() }}
        </div>
    </div>

</div>
