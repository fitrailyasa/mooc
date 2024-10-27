<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        History
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        @include('admin.history.deleteAll')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
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
                        @include('admin.instrument.show')
                    </td>
                    <td>{{ $instrument->created_at }}</td>
                    <td>{{ $instrument->user->name }}</td>
                    <td>{{ $instrument->user->place }}</td>
                    <td>{{ $instrument->user->designation }}</td>
                    <td>{{ $instrument->user->organisation }}</td>
                    <td>{{ $instrument->user->gender }}</td>
                    <td>{{ $instrument->user->age }}</td>
                    <td>{{ $instrument->user->expertise }}</td>
                    <td>{{ $instrument->user->qualification }}</td>
                    <td>{{ $instrument->user->experience }}</td>
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
        </tfoot>
    </table>
    {{-- {{ $instruments->appends(['perPage' => $perPage, 'search' => $search])->links() }} --}}

</x-admin-table>
