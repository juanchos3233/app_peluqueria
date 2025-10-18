<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nombre'=>'Corte de Cabello','precio'=>25.00,'descripcion'=>'Corte clásico y moderno','duracion'=>45,'activo'=>1],
            ['nombre'=>'Manicure','precio'=>18.00,'descripcion'=>'Cuidado de manos','duracion'=>40,'activo'=>1],
            ['nombre'=>'Pedicure','precio'=>20.00,'descripcion'=>'Cuidado de pies','duracion'=>50,'activo'=>1],
            ['nombre'=>'Tintura','precio'=>60.00,'descripcion'=>'Coloración profesional','duracion'=>90,'activo'=>1],
            ['nombre'=>'Peinado','precio'=>22.00,'descripcion'=>'Estilo para eventos','duracion'=>30,'activo'=>1],
        ];
        foreach ($data as $s) { Service::create($s); }
    }
}
