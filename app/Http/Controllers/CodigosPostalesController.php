<?php

namespace App\Http\Controllers;

use App\Models\CodigosPostales;

class CodigosPostalesController extends Controller
{
    public function getByCodigoPostal($zip_code){

        $cp = CodigosPostales::where('d_codigo',$zip_code)->get();

        if($cp){
            foreach ($cp as $c){
                $settlements[] =
                    [
                        "key" => (int)$c->id_asenta_cpcons,
                        "name" => mb_strtoupper($c->d_asenta,'utf-8'),
                        "zone_type" => mb_strtoupper($c->d_zona,'utf-8'),
                        "settlement_type" => [
                            "name" => $c->d_tipo_asenta
                        ]
                    ];
            }
            $response = response()->json([
                "zip_code" => $cp[0]->d_codigo,
                "locality" => mb_strtoupper($cp[0]->d_estado,'utf-8'),
                "federal_entity"  => [
                    "key" => (int)$cp[0]->c_estado,
                    "name" => mb_strtoupper($cp[0]->d_ciudad,'utf-8'),
                    "code" => null
                ],
                "settlements" => $settlements,
                "municipality" => [
                    "key" => (int)$cp[0]->c_mnpio,
                    "name"=> mb_strtoupper($cp[0]->D_mnpio,'utf-8')
                ]
            ]);

            return $response;
        }

        return ["Mesagge" => "No existe El Código Postal Solicitado"];
    }
}
