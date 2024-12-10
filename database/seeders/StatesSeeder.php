<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    public function run()
    {
        $states = [
            ["id" => 11, "nome" => "Rondônia", "created_at" => now(), "updated_at" => now()],
            ["id" => 12, "nome" => "Acre", "created_at" => now(), "updated_at" => now()],
            ["id" => 13, "nome" => "Amazonas", "created_at" => now(), "updated_at" => now()],
            ["id" => 14, "nome" => "Roraima", "created_at" => now(), "updated_at" => now()],
            ["id" => 15, "nome" => "Pará", "created_at" => now(), "updated_at" => now()],
            ["id" => 16, "nome" => "Amapá", "created_at" => now(), "updated_at" => now()],
            ["id" => 17, "nome" => "Tocantins", "created_at" => now(), "updated_at" => now()],
            ["id" => 21, "nome" => "Maranhão", "created_at" => now(), "updated_at" => now()],
            ["id" => 22, "nome" => "Piauí", "created_at" => now(), "updated_at" => now()],
            ["id" => 23, "nome" => "Ceará", "created_at" => now(), "updated_at" => now()],
            ["id" => 24, "nome" => "Rio Grande do Norte", "created_at" => now(), "updated_at" => now()],
            ["id" => 25, "nome" => "Paraíba", "created_at" => now(), "updated_at" => now()],
            ["id" => 26, "nome" => "Pernambuco", "created_at" => now(), "updated_at" => now()],
            ["id" => 27, "nome" => "Alagoas", "created_at" => now(), "updated_at" => now()],
            ["id" => 28, "nome" => "Sergipe", "created_at" => now(), "updated_at" => now()],
            ["id" => 29, "nome" => "Bahia", "created_at" => now(), "updated_at" => now()],
            ["id" => 31, "nome" => "Minas Gerais", "created_at" => now(), "updated_at" => now()],
            ["id" => 32, "nome" => "Espírito Santo", "created_at" => now(), "updated_at" => now()],
            ["id" => 33, "nome" => "Rio de Janeiro", "created_at" => now(), "updated_at" => now()],
            ["id" => 35, "nome" => "São Paulo", "created_at" => now(), "updated_at" => now()],
            ["id" => 41, "nome" => "Paraná", "created_at" => now(), "updated_at" => now()],
            ["id" => 42, "nome" => "Santa Catarina", "created_at" => now(), "updated_at" => now()],
            ["id" => 43, "nome" => "Rio Grande do Sul", "created_at" => now(), "updated_at" => now()],
            ["id" => 50, "nome" => "Mato Grosso do Sul", "created_at" => now(), "updated_at" => now()],
            ["id" => 51, "nome" => "Mato Grosso", "created_at" => now(), "updated_at" => now()],
            ["id" => 52, "nome" => "Goiás", "created_at" => now(), "updated_at" => now()],
            ["id" => 53, "nome" => "Distrito Federal", "created_at" => now(), "updated_at" => now()],
        ];

        DB::table('states')->insert($states);
    }
}
