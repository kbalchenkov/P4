<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		# Create the users table
		Schema::create('users', function($table) 
		
		$table->increments('id');
		$table->string('gender');
        $table->string('email')->unique();
		$table->string('password');
		$table->boolean('remember_token');
		$table->timestamps();
		});
	
	
		# Create the tags table
		Schema::create('tags', function($table) {

		$table->increments('id');
		$table->string('name', 64);
		$table->timestamps();

		});
		
		# Create the histories table
		Schema::create('histories', function($table) {

		$table->increments('id');
		$table->integer('user_id')->unsigned();
		$table->string('url_name');
		$table->timestamps();
		
		$table->foreign('user_id')
				->references('id')
				->on('users');
		

		});
		
		
		# Create the images table
		Schema::create('images', function($table) {

		$table->increments('id');
		$table->string('gender');
		$table->string('type', 200);
		$table->string('image_url', 64);
		$table->timestamps();

		});
		
		
		
		Schema::create('image_tag', function($table) {

		$table->integer('image_id')->unsigned();
		$table->integer('tag_id')->unsigned();

		$table->foreign('image_id')->references('id')->on('images');
		$table->foreign('tag_id')->references('id')->on('tags');

		});
		
		
	}

	public function down()
	{
		
		Schema::table('histories', function($table) {
		$table->dropForeign('histories_user_id_foreign'); 
		});

		Schema::table('image_tag', function($table) {
		$table->dropForeign('image_tag_image_id_foreign');
		$table->dropForeign('image_tag_tag_id_foreign'); 
		});


		Schema::drop('users');
		Schema::drop('tags');
		Schema::drop('histories');
		Schema::drop('images');
		Schema::drop('image_tag');
	}

}
