<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Sospechoso;
use App\Models\Defuncion;
use App\Models\Negativo;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    public function show(string $id){
        dd(Confirmado::find($id));
    }

    public function confirmadosxestado()
    {
       $estados = Estado::all(); 
       $casos = 0;
       foreach ($estados as $state){
        $total = $state->confirmados->sum('casos');
        $casos+= $total;
        echo "<br>"."total de casos confirmados de ".$state->nombre.": ".$casos;
       } 
    }

    public function defuncionxestado() 
    {
        $estados = Estado::all();
        $casos = 0;
        foreach ( $estados as $state) {
            $total = $state->defunciones->sum('casos');
            $casos += $total;
            echo "<br>"."total de defunciones de ".$state->nombre.": ".$casos;
        }
    }
    
    public function negativosxestado() 
    {
        $estados = Estado::all();
        $casos = 0;
        foreach ( $estados as $state) {
            $total = $state->negativos->sum('casos');
            $casos += $total;
            echo "<br>"."total de negativos de ".$state->nombre.": ".$casos;
        }
    }
   
    public function sospechososxestado() 
    {
        $estados = Estado::all();
        $casos = 0;
        foreach ( $estados as $state) {
            $total = $state->sospechosos->sum('casos');
            $casos += $total;
            echo "<br>"."total de sospechosos de ".$state->nombre.": ".$casos;
        }
    }

    public function getCasosxestado()
    {
        $estados = Estado::all();
        $casosConfirm = 0;
        $casosNeg = 0;
        $casosDef = 0;
        $casosSos = 0;

        foreach ($estados as $state) {
            $totalConfirm = $state->confirmados->sum('casos');
            $casosConfirm += $totalConfirm;

            //negativos
            $totalNeg = $state->negativos->sum('casos');
            $casosNeg += $totalNeg;

            //defunciones
            $totalDef = $state->defunciones->sum('casos');
            $casosDef += $totalDef;

            //sospechosos
            $totalSos = $state->sospechosos->sum('casos');
            $casosSos += $totalSos;

            echo "<br>"."total de confirmados de ".$state->nombre.": ".$casosConfirm."   "."Negativos: ".$casosNeg."  "."Sospechosos: ".$casosSos."  "."Defunciones: ".$casosDef;
        }
    }

    public function index()
    {
        self::getCasosxestado();
    }
    
}
