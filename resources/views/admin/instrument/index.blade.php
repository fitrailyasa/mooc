<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Instrument
    </x-slot>

    <div class="row">
        <p>You are humbly requested to give your comments based on your experience by marking Not Crucial (=1) to Most Crucial (=5) mentioning that which challenge is most crucial for the implementation of MOOCSs for the localized environment of Indonesia. Moreover, if you feel that any challenge or issue is missing, please feel free to add that issue at the end of the list. Scale values assigned to each of the five responses areas.</p>
        <div class="col-md-4 col-sm-10 col-12 mx-auto">
            <table id="" class="table table-bordered table-striped">
                <tr>
                    <th class="p-1">Level of Agreement</th>
                    <th class="p-1">Scale Values</th>
                </tr>
                @foreach ($levels as $level)
                    <tr>
                        <td class="p-1">{{ $level->name }}</td>
                        <td class="p-1">{{ $level->value }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('admin.instrument.create') }}" class="btn btn-primary">Start</a>
        @elseif(auth()->user()->role == 'user')
            <a href="{{ route('user.instrument.create') }}" class="btn btn-primary">Start</a>
        @endif
    </div>

</x-admin-layout>
