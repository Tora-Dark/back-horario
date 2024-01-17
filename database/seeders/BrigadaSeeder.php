<?php

namespace Database\Seeders;
use App\Models\Brigada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrigadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brigada::factory(4)->create();
    }
}
