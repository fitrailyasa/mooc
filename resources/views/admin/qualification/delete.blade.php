<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
    data-bs-target=".formDelete{{ $qualification->id }}"><i class="fas fa-trash"></i><span class="d-none d-sm-inline">
        {{ __('Delete') }}</span></button>

<!-- Modal -->
<div class="modal fade formDelete{{ $qualification->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete data?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.qualification.destroy', $qualification->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <input type="submit" class="btn btn-danger light" name="" id="" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
