<div class="dataTables_info" role="status" aria-live="polite">
    @lang('roles.index.pagination', [
        'firstItem' => $result->firstItem(),
        'lastItem' => $result->lastItem(),
        'total' => $result->total(),
    ])
</div>
<div class="dataTables_paginate paging_simple_numbers">
    {{ $result->links() }}
</div>
