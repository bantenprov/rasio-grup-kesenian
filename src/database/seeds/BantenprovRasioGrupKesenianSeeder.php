<?php

use Illuminate\Database\Seeder;

class BantenprovRasioGrupKesenianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovRasioGrupKesenianSeederRasioGrupKesenian::class);
    }
}
