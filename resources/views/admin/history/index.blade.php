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
                <th>{{ __('Detail') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->instruments[0]->created_at }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->place }}</td>
                    <td>{{ $user->designation }}</td>
                    <td>{{ $user->organisation }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->expertise }}</td>
                    <td>{{ $user->qualification }}</td>
                    <td>{{ $user->experience }}</td>
                    <td class="manage-row">
                        @include('admin.history.show')
                        {{--
                        @foreach ($user->instruments as $instrument)
                            {{ $instrument->result }}
                        @endforeach --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
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
                <th>{{ __('Detail') }}</th>
            </tr>
        </tfoot>
    </table>
    {{-- {{ $instruments->appends(['perPage' => $perPage, 'search' => $search])->links() }} --}}

</x-admin-table>
