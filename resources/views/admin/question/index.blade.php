<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Question
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.question.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.question.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.question.export')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.question.deleteAll')
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Question') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $questions->firstItem() + $loop->index }}</td>
                    <td>{{ $question->category->name ?? '-' }}</td>
                    <td>{{ $question->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.question.edit')
                            @include('admin.question.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Question') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $questions->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
