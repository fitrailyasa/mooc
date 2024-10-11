<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Qualification
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.qualification.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.qualification.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.qualification.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.qualification.deleteAll')
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
            @foreach ($qualifications as $qualification)
                <tr>
                    <td>{{ $qualifications->firstItem() + $loop->index }}</td>
                    <td>{{ $qualification->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.qualification.edit')
                            @include('admin.qualification.delete')
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
    {{ $qualifications->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
