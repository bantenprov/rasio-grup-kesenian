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

        $angka_melek_hurufs = (object) [
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

        foreach ($angka_melek_hurufs as $angka_melek_huruf) {
            $model = RasioGrupKesenian::updateOrCreate(
                [
                    'label' => $angka_melek_huruf->label,
                ],
                [
                    'description' => $angka_melek_huruf->description,
                ]
            );
            $model->save();
        }
	}
}
