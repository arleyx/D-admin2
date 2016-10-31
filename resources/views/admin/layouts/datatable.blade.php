@push('links')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap.css') }}" media="screen" charset="utf-8"/>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': false,
                @if (isset($noactions))
                    'columnDefs': [
                        {
                            'orderable': false,
                            'searchable': false,
                            'targets': {{ str_replace(['{', '}'], '', json_encode($noactions)) }}
                        }
                    ]
                @endif
            });
        });
    </script>
@endpush
