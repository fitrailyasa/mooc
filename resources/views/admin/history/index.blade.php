<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        History
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Detail') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Place') }}</th>
                <th>{{ __('Designation') }}</th>
                <th>{{ __('Organisation') }}</th>
                <th>{{ __('Gender') }}</th>
                <th>{{ __('Age') }}</th>
                <th>{{ __('Expertise') }}</th>
                <th>{{ __('Qualification') }}</th>
                <th>{{ __('Experience') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instruments as $instrument)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            <!-- show Buttons -->
                            @include('admin.instrument.show')
                        @endif
                    </td>
                    <td>{{ $instrument->date }}</td>
                    <td>{{ $instrument->name }}</td>
                    <td>{{ $instrument->place }}</td>
                    <td>{{ $instrument->designation }}</td>
                    <td>{{ $instrument->organisation }}</td>
                    <td>{{ $instrument->gender }}</td>
                    <td>{{ $instrument->age }}</td>
                    <td>{{ $instrument->expertise }}</td>
                    <td>{{ $instrument->qualification }}</td>
                    <td>{{ $instrument->experience }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Detail') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Place') }}</th>
                <th>{{ __('Designation') }}</th>
                <th>{{ __('Organisation') }}</th>
                <th>{{ __('Gender') }}</th>
                <th>{{ __('Age') }}</th>
                <th>{{ __('Expertise') }}</th>
                <th>{{ __('Qualification') }}</th>
                <th>{{ __('Experience') }}</th>
            </tr>
            <tr>
                <th colspan="12">
                    {{ $instruments->appends(['perPage' => $perPage, 'search' => $search])->links() }}
                </th>
            </tr>
        </tfoot>
    </table>

</x-admin-layout>
