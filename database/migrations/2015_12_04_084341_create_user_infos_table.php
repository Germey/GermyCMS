<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_infos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('gender')->default(0);
            $table->date('birthday');
            $table->integer('blood_type')->default(0);
            $table->text('brief')->nullable();
            $table->text('detail')->nullable();
            $table->string('domain')->nullable();
            $table->string('qq')->nullable();
            $table->string('wechat')->nullable();
            $table->string('weibo')->nullable();
            $table->text('education')->nullable();
            $table->text('work')->nullable();
            $table->integer('popularity')->default(0);
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
		Schema::drop('user_infos');
	}

}
