<?php

use Illuminate\Database\Seeder;

class SaborTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sabor1 = new App\Sabor;
        $sabor1->sbDescricao = 'Calabresa';
        $sabor1->sbValor = 0;
        $sabor1->sbTempo = 0;
        $sabor1->save();

        $sabor2 = new App\Sabor;
        $sabor2->sbDescricao = 'Marguerita';
        $sabor2->sbValor = 0;
        $sabor2->sbTempo = 0;
        $sabor2->save();

        $sabor3 = new App\Sabor;
        $sabor3->sbDescricao = 'Portuguesa';
        $sabor3->sbValor = 0;
        $sabor3->sbTempo = 5;
        $sabor3->save();
    }
}
