<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('jumlah_penduduk_jenis_pekerjaans', function(Blueprint $table) {
			$table->foreign('province_id')->references('id')->on('provinces')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('jumlah_penduduk_jenis_pekerjaans', function(Blueprint $table) {
			$table->foreign('regency_id')->references('id')->on('regencies')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('regencies', function(Blueprint $table) {
			$table->foreign('province_id')->references('id')->on('provinces')
						->onDelete('set null')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('jumlah_penduduk_jenis_pekerjaans', function(Blueprint $table) {
			$table->dropForeign('jumlah_penduduk_jenis_pekerjaans_province_id_foreign');
		});
		Schema::table('jumlah_penduduk_jenis_pekerjaans', function(Blueprint $table) {
			$table->dropForeign('jumlah_penduduk_jenis_pekerjaans_regency_id_foreign');
		});
		Schema::table('regencies', function(Blueprint $table) {
			$table->dropForeign('regencies_province_id_foreign');
		});
	}
}