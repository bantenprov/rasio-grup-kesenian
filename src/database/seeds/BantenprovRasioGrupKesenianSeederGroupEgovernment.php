<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\RasioGrupKesenian\Models\Bantenprov\RasioGrupKesenian\RasioGrupKesenian;

class BantenprovRasioGrupKesenianSeederRasioGrupKesenian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $rasio_grup_kesenians = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($rasio_grup_kesenians as $rasio_grup_kesenian) {
            $model = RasioGrupKesenian::updateOrCreate(
                [
                    'label' => $rasio_grup_kesenian->label,
                ],
                [
                    'description' => $rasio_grup_kesenian->description,
                ]
            );
            $model->save();
        }
	}
}
