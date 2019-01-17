<?php

use Illuminate\Database\Seeder;

class TamanhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamanhoP = new App\Tamanho;
        $tamanhoP->tmDescricao = 'Pequena';
        $tamanhoP->tmValor = 20;
        $tamanhoP->tmTempo = 15;
        $tamanhoP->save();

        $tamanhoM = new App\Tamanho;
        $tamanhoM->tmDescricao = 'Média';
        $tamanhoM->tmValor = 30;
        $tamanhoM->tmTempo = 20;
        $tamanhoM->save();

        $tamanhoG = new App\Tamanho;
        $tamanhoG->tmDescricao = 'Grande';
        $tamanhoG->tmValor = 40;
        $tamanhoG->tmTempo = 25;
        $tamanhoG->save();
    }
}
