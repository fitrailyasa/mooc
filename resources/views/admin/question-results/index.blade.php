<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Question Result
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
                <th>{{ __('Avg') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $questions->firstItem() + $loop->index }}</td>
                    <td>{{ $question->category->name ?? '-' }}</td>
                    <td>{{ $question->name ?? '-' }}</td>
                    <td>
                        @php
                            $avg = 0;
                            $total = 0;
                            $count = 0;
                            foreach ($question->instruments as $instrument) {
                                $total += $instrument->result;
                                $count++;
                            }
                            if ($count > 0) {
                                $avg = $total / $count;
                            }
                        @endphp
                        {{ number_format($avg, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Question') }}</th>
                <th>{{ __('Avg') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $questions->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
