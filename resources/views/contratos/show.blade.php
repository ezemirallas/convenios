<x-app-layout>
    <div class="container mx-auto max-w-7xl px-2 sm:px-6 lg:py-8 py-8">
        <h1 class="text-4xl font-bold text-gray-600"></h1>



        <div class="grid grid-cols-1 lg:gril-cols-2 gap-6">

            <div class="lg:col-span-2">

                <div class="antialiased max-w-6xl mx-auto my-1 px-8">

                    <div class="relative block md:flex items-center">
                        <div class="@if($contrato->category_id == 1 && count($contrato->contratos) == 0 ) w-full @else w-full md:w-1/2 @endif relative z-1 bg-gray-100 rounded shadow-lg overflow-hidden mx-2 px-8">
                            <div class="text-lg font-medium text-green-500 uppercase p-8 text-center border-b border-gray-200 tracking-wide">
                                {{$contrato->objeto}}
                            </div>
                            <div class="block sm:flex md:block lg:flex items-center justify-center">
                                <div class="text-lg text-gray-500 mb-2 px-1 py-1">
                                    {!! $contrato->observacion !!}
                                </div>
                            </div>
                            <div class="flex justify-center mt-3 mb-16">
                                <div class="text-base text-gray-500 mt-4">
                                    <table class="border-collapse border border-slate-400">
                                        <tbody>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Fecha Inicio:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->fechainicio}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Fecha Finalización:</td>
                                            <td class="border border-slate-300 px-10"> {{$contrato->fechafinalizacion}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Renovación automática:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->renovacionautomatica?'Si':'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Año de Resolución:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->anioresolucion}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Número de Resolución:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->numeroresolucion}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10"> Creado por:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Área generadora:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->areageneradora->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Área responsable:</td>
                                            <td class="border border-slate-300 px-10">{{$contrato->arearesponsable->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Categoría:</td>
                                            <td class="border border-slate-300 px-10 text-purple-900">{{$contrato->category->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-slate-300 px-10">Resolución:</td>
                                            <td class="border border-slate-300 px-10">
                                                @if($contrato->file)
                                                    <a title="" target="_blank" href="{{ Storage::url($contrato->file->url)}}">
                                                        <img src="{{ Storage::url('archivos/pdf.png')}}" alt="" height="30px" width="30px" />
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="@if($contrato->category_id == 1 && count($contrato->contratos) == 0 ) hidden @else show @endif w-full md:w-1/2 relative z-1 bg-gray-100 rounded shadow-lg overflow-hidden mx-2 px-8">
                            <div class="text-lg font-medium text-green-500 uppercase py-1 text-center tracking-wide">
                                Documentos relacionados:
                            </div>
                            <div class="flex justify-center mt-3 mb-16">
                                <div class="text-base text-gray-500 mt-4">
                                    <table class="border-collapse border border-slate-400">
                                        <thead>
                                            <tr>
                                                <th class="border border-slate-300 lg:px-10">Objeto</th>
                                                <th class="border border-slate-300 lg:px-10">Categoría</th>
                                                <th class="border border-slate-300 lg:px-10">Resolución</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($contrato->category_id==1)
                                                @foreach ($contrato->contratos as $addendaprorroga)
                                                    @if ($contrato->contratos)
                                                        <tr>
                                                            <td class="border border-slate-300 lg:px-10">
                                                                <a class="flex items-center justify-center text-center p-4 text-blue-900" href="{{route('contratos.show',$addendaprorroga)}}">
                                                                    <span>{{$addendaprorroga->objeto}}</span>
                                                                </a>
                                                            </td>
                                                            <td class="border border-slate-300 text-purple-900 lg:px-10">
                                                                {{$addendaprorroga->category->name}}
                                                            </td>
                                                            <td class="border border-slate-300 lg:px-10">
                                                                @if($contrato->file)
                                                                    <a title="" target="_blank" href="{{ Storage::url($contrato->file->url)}}">
                                                                        <img src="{{ Storage::url('archivos/pdf.png')}}" alt="" height="30px" width="30px" />
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <div class="flex items-center justify-center w-1/2 text-center p-4">
                                                            <span>Sin documentos relacionados</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                @isset ($contrato->parent)
                                                    <tr class="@if($contrato->parent) show @else hidden @endif">
                                                        <td class="border border-slate-300 lg:px-10">
                                                            <a class="flex items-center w-1/2 text-center p-4 text-blue-900" href="{{route('contratos.show',$contrato->parent)}}">
                                                                <span>{{$contrato->parent->objeto}}</span>
                                                            </a>
                                                        </td>
                                                        <td class="border border-slate-300 text-purple-900 lg:px-10">
                                                            {{$contrato->parent->category->name}}
                                                        </td>
                                                        <td class="border border-slate-300 lg:px-10">
                                                            @if($contrato->file)
                                                                <a title="" target="_blank" href="{{ Storage::url($contrato->file->url)}}">
                                                                    <img src="{{ Storage::url('archivos/pdf.png')}}" alt="" height="30px" width="30px" />
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @else
                                                    <a class="@if($contrato->parent) show @else hidden @endif flex items-center justify-center w-1/2 text-center p-4 border-b border-blue-800">
                                                        <span>Sin documentos relacionados</span>
                                                    </a>
                                                @endisset
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
