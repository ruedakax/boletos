<?php

use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eventos')->insert([
            [
                'nombre'=>'Evento Uno',
                'aforo'=> 100
            ],
            [
                'nombre'=>'Evento Dos',
                'aforo'=> 50
            ]
        ]);
    }
}
