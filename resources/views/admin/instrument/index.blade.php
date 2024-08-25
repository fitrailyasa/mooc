<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Instrument
    </x-slot>

    <div class="row">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aliquid nihil tenetur placeat rem dignissimos
            officia itaque eius ex cumque enim odio saepe veniam ipsa, laborum, at sapiente aperiam magni, optio
            corrupti. Omnis porro at commodi provident veniam, nam necessitatibus quam praesentium tempore eligendi ut
            illum consequuntur ipsum! Velit, ratione.</p>
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
        <a href="{{ route('admin.instrument.create') }}" class="btn btn-primary">Start</a>
    </div>

</x-admin-layout>
