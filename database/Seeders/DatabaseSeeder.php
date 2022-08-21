<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeders\WithoutModelEvents;
use App\Models\CodigosPostales;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CodigosPostales::truncate();
        /*
                $codigopostal = array(
                    'd_codigo' =>  01000,
                    "d_asenta" => "San �ngel",
                    "d_tipo_asenta" => "Colonia",
                    "D_mnpio" => "lvaro",
                    "d_estado" => "Obreg",
                    "d_ciudad" => "Ciudad de",
                    "d_CP" => "Ciudad",
                    "c_estado" => 01001,
                    "c_oficina" => 9,
                    "c_CP" => 01001,
                    "c_tipo_asenta" => 0001,
                    "c_mnpio" => 0001,
                    "id_asenta_cpcons" => 0001,
                    "d_zona" => "Urbano",
                    "c_cve_ciudad" => 01
                );
        */
        $heading = true;
        $input_file = fopen(public_path("CPdescarga.txt"), "r");
        while (($record = fgetcsv($input_file, 500, "|")) !== FALSE)
        {

            if (!$heading)
            {
                DB::insert('insert into codigos_postales (
                              d_codigo,
                              d_asenta,
                              d_tipo_asenta,
                              D_mnpio,
                              d_estado,
                              d_ciudad,
                              d_CP,
                              c_estado,
                              c_oficina,
                              c_CP,
                              c_tipo_asenta,
                              c_mnpio,
                              id_asenta_cpcons,
                              d_zona,
                              c_cve_ciudad
                              ) values (?, ?,?, ?,?, ?,?, ?,?, ?,?, ?,?, ?, ?)',
                        [
                            $record['0'],
                            iconv("ISO-8859-1", "UTF-8", $record['1']),
                            iconv("ISO-8859-1", "UTF-8", $record['2']),
                            iconv("ISO-8859-1", "UTF-8", $record['3']),
                            iconv("ISO-8859-1", "UTF-8", $record['4']),
                            iconv("ISO-8859-1", "UTF-8", $record['5']),
                            $record['6'],
                            $record['7'],
                            $record['8'],
                            $record['9'],
                            $record['10'],
                            $record['11'],
                            $record['12'],
                            $record['13'],
                            $record['14']
                    ]);

            }
            $heading = false;
        }
        fclose($input_file);

    }
}
