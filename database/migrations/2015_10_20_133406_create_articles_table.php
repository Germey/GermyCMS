<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('subtitle')->nullable();
			$table->string('alias')->nullable();
			$table->text('summary')->nullable();
			$table->text('content');
			$table->string('thumb')->nullable();
			$table->string('source')->nullable();
			$table->string('source_link')->nullable();
			$table->integer('author_id')->default(0);
			$table->integer('category_id')->default(0);
			$table->integer('parent_id')->default(0);
			$table->integer('weight')->default(0);
			$table->integer('status')->default(0);
			$table->integer('allow_comment')->default(1);
			$table->integer('pv')->default(0);
			$table->integer('praise')->default(0);
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
		Schema::drop('articles');
	}

}
