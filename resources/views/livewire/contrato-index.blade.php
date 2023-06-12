<div class="card">
    <div class="card-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 py-2">
            <div class="row grid grid-cols-3 gap-4 content-start">
                <div class="col">
                    <form class="flex items-center">
                        <label for="voice-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" wire:model="search" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una palabra clave..." required="">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <select wire:model="categoria" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected>Seleccione una categoría</option>
                        <option value="1">Contratos</option>
                        <option value="2">Adendas</option>
                        <option value="3">Prórrogas</option>
                    </select>
                </div>
                <div class="col">
                    <select wire:model="area" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected>Seleccione un área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @if ($contratos->count())

            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 py-1">
                <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                    @foreach ($contratos as $contrato)
                        <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col md:flex-row">
                            <div class="w-full h-full md:w-2/5 h-80">
                                <img class="object-center object-cover w-full h-full" src="@if($contrato->image) {{Storage::url($contrato->image->url)}} @else https://www.softzone.es/app/uploads-softzone.es/2017/01/buscar.jpg?x=480&y=375&quality=40 @endif" alt="photo">
                            </div>
                            <div class="w-full md:w-3/5 text-left p-4 md:p-4 space-y-2">
                                <div style="text-align: left; width: 100%; margin: auto;content: ''; display: table; clear: both;">
                                    <div style="width: 70%; float: left; background-color: #FFFFFF;">
                                        <h1 class="text-4xl flex">
                                            <a href="{{route('contratos.show',$contrato)}}">
                                                {{$contrato->objeto}}
                                            </a>
                                        </h1>
                                    </div>
                                    <div class="rounded-full py-0.5 px-0.5 bg-gray-700 text-gray-100" style="width: 30%; float:right;">
                                        <h6 class="text-1xl text-center">
                                                {{$contrato->parte->name}}
                                        </h6>
                                    </div>
                                </div>
                                @foreach ($contrato->personas as $persona)
                                    <p class="text-base text-gray-400 font-normal">{{$persona->name}}</p>
                                @endforeach
                                <p class="text-base leading-relaxed text-gray-500 font-normal">{!!$contrato->observacion!!}</p>
                                <p class="text-base text-gray-400 font-normal">{{$contrato->category->name}}</p>
                                <div class="flex justify-start space-x-2">
                                    <a href="#" class="text-gray-500 hover:text-gray-600">
                                        @if($contrato->file)
                                            <a title="" target="_blank" href="{{ Storage::url($contrato->file->url)}}">
                                                <img src="{{ Storage::url('archivos/pdf.png')}}" alt="" height="30px" width="30px" />
                                            </a>
                                        @endif
                                    </a>
                                    @php
                                        $date1 = new DateTime(Now());
                                        $date2 = new DateTime($contrato->fechafinalizacion);
                                        $estadovencido = false;
                                    @endphp
                                    @if ($date1<=$date2)
                                        @php
                                            $diff = $date1->diff($date2);
                                            $dias = $diff->days + 1;
                                            $diff = $date1->diff($date2);
                                            $dias = $diff->days + 1;
                                            $estadonv = 'vence en ' . $dias . ' días';
                                            $estadovencido=false;
                                        @endphp
                                    @else
                                        @php
                                            $dias = -1;
                                            $estadovencido = true;
                                        @endphp
                                    @endif
                                    <div
                                        @if ( $dias >= 0 && $dias <= 30 )
                                            class="rounded-full py-0.5 px-0.5 bg-red-400 text-black-100"
                                        @elseif ( $dias >= 31 && $dias <= 60 )
                                            class="rounded-full py-0.5 px-0.5 bg-yellow-400 text-black-100"
                                        @elseif ( $dias >= 61 )
                                            class="rounded-full py-0.5 px-0.5 bg-green-400 text-black-100"
                                        @else
                                            class="rounded-full py-0.5 px-0.5 bg-red-400 text-gray-100"
                                        @endif>
                                        @php
                                            if(!$estadovencido){
                                                echo $estadonv;
                                            } else {
                                                echo 'vencido';
                                            }
                                        @endphp
                                    </div>
                                </div>
                                @php
                                    date_default_timezone_set('America/Argentina/Mendoza');
                                    $mesinicio = date('M', strtotime($contrato->fechainicio));
                                    $diainicio = date('d', strtotime($contrato->fechainicio));
                                    $anioinicio = date('Y', strtotime($contrato->fechainicio));
                                    $mesfinaliza = date('M', strtotime($contrato->fechafinalizacion));
                                    $diafinaliza = date('d', strtotime($contrato->fechafinalizacion));
                                    $aniofinaliza = date('Y', strtotime($contrato->fechafinalizacion));
                                @endphp
                                <div class="flex justify-start space-x-1">
                                    <div class="min-w-20 bg-white min-h-30 p-1 mb-1 font-medium">
                                        <div class="w-20 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                                            <div class="block rounded-t overflow-hidden  text-center ">
                                                <div class="bg-blue-500 text-white py-1">
                                                Inicia
                                                </div>
                                                <div class="pt-1 border-l border-r border-white bg-white">
                                                    <span class="text-1xl font-bold leading-tight">
                                                        @php
                                                            echo $mesinicio . ' ' . $diainicio . ' ' . $anioinicio;
                                                        @endphp
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="min-w-20 bg-white min-h-30 p-1 mb-1 font-medium">
                                        <div class="w-20 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                                            <div class="block rounded-t overflow-hidden  text-center ">
                                                <div class="bg-blue-500 text-white py-1">
                                                Finaliza
                                                </div>
                                                <div class="pt-1 border-l border-r border-white bg-white">
                                                    <span class="text-1xl font-bold leading-tight">
                                                        @php
                                                            echo $mesfinaliza . ' ' . $diafinaliza . ' ' . $aniofinaliza;
                                                        @endphp
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="card-footer mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-2">
                {{$contratos->links()}}
            </div>
        </div>
    @else
        <div class="card-body">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-2">
                <div class="grid xl:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
                    <strong>No hay ningún registro coincidente</strong>
                </div>
            </div>
        </div>
    @endif
</div>
