<?php

Route::group(['prefix' => 'api/rasio-grup-kesenian', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@index',
        'create'    => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@create',
        'show'      => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@show',
        'store'     => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@store',
        'edit'      => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@edit',
        'update'    => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@update',
        'destroy'   => 'Bantenprov\RasioGrupKesenian\Http\Controllers\RasioGrupKesenianController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('rasio-grup-kesenian.index');
    Route::get('/create',       $controllers->create)->name('rasio-grup-kesenian.create');
    Route::get('/{id}',         $controllers->show)->name('rasio-grup-kesenian.show');
    Route::post('/',            $controllers->store)->name('rasio-grup-kesenian.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('rasio-grup-kesenian.edit');
    Route::put('/{id}',         $controllers->update)->name('rasio-grup-kesenian.update');
    Route::delete('/{id}',      $controllers->destroy)->name('rasio-grup-kesenian.destroy');
});
