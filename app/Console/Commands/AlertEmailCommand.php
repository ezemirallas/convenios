<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\AlertEmailVencimiento;
use Illuminate\Support\Facades\Mail;
use App\Models\Contrato;
use DateTime;

class AlertEmailCommand extends Command
{
    protected $signature = 'alert:email';

    protected $description = 'Comando que verifica la vigencia de un convenio';

    public function handle()
    {
        date_default_timezone_set('America/Argentina/Mendoza');
        $fecha_actual = date("Y-m-d");  //Fecha actual
        $fecha_mas_90_dias = date("Y-m-d",strtotime($fecha_actual."+ 90 days")); //de esta fecha consultar la fecha_vencimiento en convenio en la BD

        //Datos del convenio
        $convenios = Contrato::where('fechafinalizacion', $fecha_mas_90_dias)->get();
        foreach ($convenios as $convenio) {
            $fechaInicio = new DateTime($convenio->fechainicio);
            $fechaFin = new DateTime($convenio->fechafinalizacion);
            $intervalo = $fechaInicio->diff($fechaFin);
            $duracion = $intervalo->y . " años, " . $intervalo->m." meses, ".$intervalo->d." dias";
            $mailData = [
                'nombreconvenio' => $convenio->name,
                'fechainicioconvenio' => $convenio->fechainicio,
                'fechafinconvenio' => $convenio->fechafinalizacion,
                'objeto' => $convenio->objeto,
                'categoria' => $convenio->category->name,
                'areageneradora' => $convenio->areageneradora->name,
                'arearesponsable' => $convenio->arearesponsable->name,
                'responsables' => $convenio->arearesponsable->responsables,
                'duracion' => $duracion,
                'resolucion' => $convenio->numeroresolucion,
                'anioresolucion' => $convenio->anioresolucion,
            ];
            $correo = new AlertEmailVencimiento($mailData);
            //Envíar para cada responsable de cada área responsable.
            foreach ($convenio->arearesponsable->responsables as $responsable) {
                Mail::to($responsable->email)->send($correo);
            }
        }

    }
}
