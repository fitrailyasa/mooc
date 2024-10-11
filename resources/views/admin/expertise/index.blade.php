<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Expertise
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.expertise.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.expertise.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.expertise.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.expertise.deleteAll')
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('layouts.admin.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expertises as $expertise)
                <tr>
                    <td>{{ $expertises->firstItem() + $loop->index }}</td>
                    <td>{{ $expertise->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.expertise.edit')
                            @include('admin.expertise.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $expertises->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
