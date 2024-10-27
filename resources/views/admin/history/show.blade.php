<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-primary mr-2" data-bs-toggle="modal"
    data-bs-target=".formShow{{ $user->id }}"><i class="fas fa-eye"></i></i></button>

<!-- Modal -->
<div class="modal fade formShow{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Detail Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <table class="">
                                <thead>
                                    <tr>
                                        <th class="p-1">Questiont</th>
                                        <th class="p-1">result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->instruments as $instrument)
                                        <tr>
                                            <td class="p-1">{{ $instrument->question->name }}</td>
                                            <td class="p-1">{{ $instrument->result }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                {{-- <button type="submit" class="btn btn-primary">{{ __('Save') }}</button> --}}
            </div>

        </div>
    </div>
</div>
