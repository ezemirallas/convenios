<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMPORTANTE</title>

    <style>
        h1{
            color:blue;
        }
        .alerta{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Hospital Universitario</h1>
    <p class="alerta"><b>Alerta de vencimiento:</b> {{ $mailData['nombreconvenio']}}: <b>{{ $mailData['fechafinconvenio']}}</b></p>
    <p><b>Inicia:</b> {{ $mailData['fechainicioconvenio']}}</p>
    <p class="alerta"><b>Finaliza:</b> {{ $mailData['fechafinconvenio']}} </p>
    <p><b>Objeto:</b> {{ $mailData['objeto']}}</p>
    <p><b>Categoría:</b> {{ $mailData['categoria']}}</p>
    <p class="alerta"><b>Duración: {{ $mailData['duracion']}}</b></p>
    <p><b>Resolución:</b> {{ $mailData['resolucion']}}</p>
    <p><b>Año de Resolución:</b> {{ $mailData['anioresolucion']}}</p>
    <p><b>Área Generadora:</b> {{ $mailData['areageneradora']}}</p>
    <p><b>Área Responsable:</b> {{ $mailData['arearesponsable']}}</p>
    <p>Personas Responsables:</p>
    @foreach ($mailData['responsables'] as $responsable)
        {{ $responsable->apellido }}, {{ $responsable->nombre }}
        <br>
    @endforeach
</body>
</html>
