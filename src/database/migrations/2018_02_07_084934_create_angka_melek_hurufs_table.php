<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkaMelekHurufsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('angka_melek_hurufs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('label', 255);
			$table->string('description', 255)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('angka_melek_hurufs');
	}
}
