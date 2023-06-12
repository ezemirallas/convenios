<div class="card">
    <div class="card-header">
        <div class="px-6 py-1 flex items-center">
            <x-input class="form-control flex-1" placeholder="Ingrese el apellido de un responsable" type="text" wire:model="search"></x-input>
        </div>
    </div>

    @if ($responsables->count())
        <div class="card-body">
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="table min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="w-40 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('id')">
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
                            <th scope="col" class="w-40 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('apellido')">
                                Apellido
                                {{--Sort--}}
                                @if ($sort == 'apellido')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="w-40 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('nombre')">
                                Nombre
                                {{--Sort--}}
                                @if ($sort == 'nombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="w-40 cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('email')">
                                email
                                {{--Sort--}}
                                @if ($sort == 'email')
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
                    @foreach ($responsables as $responsable)
                        <tr>
                            <td>{{$responsable->id}}</td>
                            <td>{{$responsable->apellido}}</td>
                            <td>{{$responsable->nombre}}</td>
                            <td>{{$responsable->email}}</td>
                            @can('admin.responsables.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.responsables.edit',$responsable)}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                </td>
                            @endcan
                            @can('admin.responsables.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.responsables.destroy',$responsable)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{$responsables->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro coincidente</strong>
        </div>
    @endif

</div>
