<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Level
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.level.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.level.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.level.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.level.deleteAll')
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('admin.level.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Code') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($levels as $level)
                <tr>
                    <td>{{ $levels->firstItem() + $loop->index }}</td>
                    <td>{{ $level->name ?? '-' }}</td>
                    <td>{{ $level->code ?? '-' }}</td>
                    <td>{{ $level->value ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.level.edit')
                            @include('admin.level.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Code') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $levels->appends(['perPage' => $perPage, 'search' => $search])->links() }}
                </th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
