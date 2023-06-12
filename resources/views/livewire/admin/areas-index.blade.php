<div class="card">
    <div class="card-header">
        <div class="px-6 py-1 flex items-center">
            <x-input class="form-control flex-1" placeholder="Ingrese el nombre de un área" type="text" wire:model="search"></x-input>
        </div>
    </div>

    @if ($areas->count())
        <div class="card-body">
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="table min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('id')">
                                ID
                                {{--Sort--}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('name')">
                                Nombre
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{$area->id}}</td>
                                <td>{{$area->name}}</td>
                                <td width="10px">
                                    @can('admin.areas.edit')
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.areas.edit', $area)}}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.areas.destroy')
                                        <form action="{{route('admin.areas.destroy',$area)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{$areas->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro coincidente</strong>
        </div>
    @endif
</div>
