<?php

use Illuminate\Database\Seeder;

class AdicionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adicional1 = new App\Adicional;
        $adicional1->adDescricao = 'Extra Bacon';
        $adicional1->adValor = 3;
        $adicional1->adTempo = 0;
        $adicional1->save();

        $adicional2 = new App\Adicional;
        $adicional2->adDescricao = 'Sem Cebola';
        $adicional2->adValor = 0;
        $adicional2->adTempo = 0;
        $adicional2->save();

        $adicional3 = new App\Adicional;
        $adicional3->adDescricao = 'Borda Recheada';
        $adicional3->adValor = 5;
        $adicional3->adTempo = 5;
        $adicional3->save();

    }
}
