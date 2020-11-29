<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Runs the migrations.
	 *
	 * @return void
	 */
	public function up() : void
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('username');
			$table->string('email');
			$table->timestamps();
		});
	}

	/**
	 * Reverses the migrations.
	 *
	 * @return void
	 */
	public function down() : void
	{
		Schema::dropIfExists('users');
	}
}
