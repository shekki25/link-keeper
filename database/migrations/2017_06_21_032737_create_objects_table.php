<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('objects', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
			$table->string('title');
			$table->text('description');
			$table->string('featured_image');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('objects');
	}
}
