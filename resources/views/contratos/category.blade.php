<x-app-layout>

    <div class="mx-auto max-w-7xl px-2 sm:px-6">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{$category->name}}</h1>

            @foreach ($contratos as $contrato)
                <article class="mb-12 bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-21 object-cover object-center" src="{{ Storage::url('archivos/imagefondo.webp')}}" alt="">

                    <div class="px-6 py-4">
                        <h1 class="font-bold text-xl mb-2">
                            <a href="{{route('contratos.show',$contrato)}}">{{$contrato->name}}</a>
                        </h1>

                        <div class="text-gray-700 text-base ">
                            {!! $contrato->observacion !!}
                        </div>

                        <h6 class="text-1xl text-red leading-8 font-bold mt-8">
                            @if($contrato->file)
                                <a title="Resolución N°125/2023" target="_blank" href="{{ Storage::url($contrato->file->url)}}">
                                    <img src="{{ Storage::url('archivos/pdf.png')}}" alt="" height="50px" width="50px" />
                                </a>
                            @endif
                        </h6>
                    </div>

                    <div class="px-6 pt-4 pb-2">
                        @foreach ($contrato->personas as $persona)
                            <a class="inline-block bg-gray-200 rounded-full px-1 py-1 text-sm text-gray-700 mr-2" href="">{{$persona->name}}</a>
                        @endforeach
                    </div>
                </article>
            @endforeach

        <div class="mt-4">
            {{$contratos->links()}}
        </div>
    </div>

</x-app-layout>
