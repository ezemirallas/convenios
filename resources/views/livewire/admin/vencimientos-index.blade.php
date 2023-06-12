<div class="card">
    <div class="card-header">
            <div class="px-6 py-1 flex items-center">
                <x-input class="form-control flex-1" placeholder="Ingrese el nombre de un documento" type="text" wire:model="search"></x-input>
            </div>
        </div>

            @if ($documentos->count())
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
                                    <th  scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200">
                                        Días al vencimiento
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
                                    <td scope="col" class="cursor-pointer px-6 py-3 text-left text-md text-gray-200" >Clase</td>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                                @php
                                    $date1 = new DateTime(Now());
                                    $date2 = new DateTime($documento->fechafinalizacion);
                                    $diff = $date1->diff($date2);
                                    $dias = $diff->days + 1;
                                @endphp
                                <tr>
                                    <td>{{$documento->id}}</td>
                                    <td>{{$documento->objeto}}</td>
                                    <td>{{$documento->fechainicio}}</td>
                                    <td
                                        @if ( $dias >= 0 && $dias <= 30 )
                                            style="background-color: rgb(254, 126, 98);"
                                        @elseif ( $dias >= 31 && $dias <= 60 )
                                            style="background-color: rgb(254, 255, 186);"
                                        @elseif ( $dias >= 61 && $dias <= 90 )
                                            style="background-color: rgb(212, 255, 186);"
                                        @endif
                                    >{{$documento->fechafinalizacion}}</td>
                                    <td
                                        @if ( $dias >= 0 && $dias <= 30 )
                                            style="background-color: rgb(254, 126, 98);"
                                        @elseif ( $dias >= 31 && $dias <= 60 )
                                            style="background-color: rgb(254, 255, 186);"
                                        @elseif ( $dias >= 61 && $dias <= 90 )
                                            style="background-color: rgb(212, 255, 186);"
                                        @endif
                                        >
                                        @php
                                            echo $dias .' días';
                                        @endphp
                                    </td>
                                    <td>{{$documento->numeroresolucion}}</td>
                                    <td>{{$documento->anioresolucion}}</td>
                                    <td>{{$documento->areageneradora->name}}</td>
                                    <td>{{$documento->arearesponsable->name}}</td>
                                    <td>{{$documento->category->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

            <div class="card-footer">
                {{$documentos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro coincidente</strong>
            </div>
        @endif
</div>
