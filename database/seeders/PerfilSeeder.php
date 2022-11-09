<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'NMPERFIL' => "Administrador", 
            'FLATIVO' => "S",
            'DSDESCRICAO' => "Acesso a todo o sistema"]
        );

        Perfil::create([
            'NMPERFIL' => "Veterinário", 
            'FLATIVO' => "S",
            'DSDESCRICAO' => "Acesso a todo o gerenciamento do animal"]
        );

        Perfil::create([
            'NMPERFIL' => "Default", 
            'FLATIVO' => "S",
            'DSDESCRICAO' => "Acesso ao dashboard"]
        );
    }
}
