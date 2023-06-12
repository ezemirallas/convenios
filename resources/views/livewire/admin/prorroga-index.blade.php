<div class="card">
    <div class="card-header">
            <div class="px-6 py-1 flex items-center">
                <x-input class="form-control flex-1" placeholder="Ingrese el nombre de una prórroga" type="text" wire:model="search"></x-input>
            </div>
        </div>

            @if ($prorrogas->count())
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
                                    <th  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('objeto')">
                                        Objeto
                                        {{--Sort--}}
                                        @if ($sort == 'objeto')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        @endif
                                    </th>
                                    <th  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('fechainicio')">
                                        Inicio
                                        {{--Sort--}}
                                        @if ($sort == 'fechainicio')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        @endif
                                    </th>
                                    <th  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('fechafinalizacion')">
                                        Finalización
                                        {{--Sort--}}
                                        @if ($sort == 'fechafinalizacion')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        @endif
                                    </th>
                                    <td  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('numeroresolucion')">
                                        Resolución
                                        {{--Sort--}}
                                        @if ($sort == 'numeroresolucion')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        @endif
                                    </td>
                                    <td  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" wire:click="order('anioresolucion')">
                                        Año Res.
                                        {{--Sort--}}
                                        @if ($sort == 'anioresolucion')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        @endif
                                    </td>
                                    <td scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" >Area Gen.</td>
                                    <td scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" >Area Resp.</td>
                                    <th colspan="3"></th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($prorrogas as $prorroga)
                                <tr>
                                    <td>{{$prorroga->id}}</td>
                                    <td>{{$prorroga->objeto}}</td>
                                    <td>{{$prorroga->fechainicio}}</td>
                                    <td>{{$prorroga->fechafinalizacion}}</td>
                                    <td>{{$prorroga->numeroresolucion}}</td>
                                    <td>{{$prorroga->anioresolucion}}</td>
                                    <td>{{$prorroga->areageneradora->name}}</td>
                                    <td>{{$prorroga->arearesponsable->name}}</td>
                                    <td width="10px">
                                        <a class="btn btn-secondary btn-sm" target="blanck" href="{{Storage::url($prorroga->file->url)}}">
                                            <i class="fa fa-file-pdf"></i>
                                        </a>
                                    </td>
                                    @can('admin.contratos.edit')
                                        <td width="10px">
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.contratos.edit',$prorroga)}}">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('admin.adendas.destroy')
                                        <td width="10px">
                                            <form action="{{route('admin.adendas.destroy',$prorroga)}}" method="post">
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
            {{$prorrogas->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro coincidente</strong>
            </div>
        @endif
</div>
