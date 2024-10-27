<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        User
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.user.create')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                <th>{{ __('Expertise') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td>{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $user->email ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($user->role == 'admin')
                            <span class="badge badge-primary">{{ $user->role }}</span>
                        @elseif ($user->role != 'admin')
                            <span class="badge badge-secondary">{{ $user->role }}</span>
                        @endif
                    </td>
                    <td class="d-none d-lg-table-cell">
                        @if ($user->status == 'aktif')
                            <span class="badge badge-success">{{ $user->status }}</span>
                        @elseif ($user->status != 'aktif')
                            <span class="badge badge-danger">{{ $user->status }}</span>
                        @endif
                    </td>
                    <td class="d-none d-lg-table-cell">{{ $user->expertise ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.user.edit')
                            @include('admin.user.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                <th>{{ __('Expertise') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $users->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
