<div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ trans('modal.delete.title') }}</h4>
            </div>
            <div class="modal-body">
                <p>{{ trans('modal.delete.description') }}</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    {!! csrf_field() !!}
                    {{ method_field('DELETE') }}
                    
                    <button type="submit" class="btn btn-outline">{{ trans('modal.delete.button.yes') }}</button>
                    <button type="button" class="btn btn-outline" data-dismiss="modal">{{ trans('modal.delete.button.no') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/modal/delete.js') }}"></script>
@endpush
