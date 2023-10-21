<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Sospechoso;
use App\Models\Defuncion;
use App\Models\Negativo;
use App\Models\Estado;

class GraficaController extends Controller
{
    public function GetDataConfrimados(){
        // $estados = Estado::all();
        // $casos = [];

        // foreach($estados as $state){
        //     $confirm = $state->confirmados->sum('casos');
        //     $casos[] = ["nombre" =>$state->nombre, "casos" =>$confirm];
        // }

        $confirmados = Confirmado::all();
        $negativos = Negativo::all();
        $defunciones = Defuncion::all();
        $sospechosos = Sospechoso::all();
        $casos = [];
        $confirm = 0;
        $neg = 0;
        $def = 0;
        $sos = 0;

        foreach ($confirmados as $c){
            $confirm += $c->casos;
        }
        foreach ($negativos as $n){
            $neg += $n->casos;
        }
        foreach ($defunciones as $d){
            $def += $d->casos;
        }
        foreach ($sospechosos as $s){
            $sos += $s->casos;       
        }
        $casos[] = [
            [
                "tipo" => "confirmados", 
                "total" => $confirm,
            ], 
            [
                "tipo" => "negativos",
                "total" => $neg,
            ],
            [
                "tipo"=> "sospechosos", 
                "total"=>$sos,
            ], 
            [
                "tipo"=>"Defunciones",
                "total"=>$def,
            ],
        ];

        
        return response()->json($casos);
        // return view('graficas.confirmados')->with($casos);
        }


    public function showGrafica()
    {
        return view('graficas.confirmados');
    }
}
