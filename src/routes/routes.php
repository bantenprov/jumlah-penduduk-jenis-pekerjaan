<?php

Route::group(['prefix' => 'jumlah-penduduk-jenis-pekerjaan', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@index',
        'create'     => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@create',
        'store'     => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@store',
        'show'      => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@show',
        'update'    => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@update',
        'destroy'   => 'Bantenprov\JPJenisPekerjaan\Http\Controllers\JPJenisPekerjaanController@destroy',
    ];

    Route::get('/',$controllers->index)->name('jumlah-penduduk-jenis-pekerjaan.index');
    Route::get('/create',$controllers->create)->name('jumlah-penduduk-jenis-pekerjaan.create');
    Route::post('/store',$controllers->store)->name('jumlah-penduduk-jenis-pekerjaan.store');
    Route::get('/{id}',$controllers->show)->name('jumlah-penduduk-jenis-pekerjaan.show');
    Route::put('/{id}/update',$controllers->update)->name('jumlah-penduduk-jenis-pekerjaan.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('jumlah-penduduk-jenis-pekerjaan.destroy');

});

