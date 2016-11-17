<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldsToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function ($table) {
           
        $table->enum('post_type', ['post', 'slider'])->default('post')->after('content');
        $table->enum('post_position', ['Top', 'Bottom'])->default('Top');
        $table->string('post_on')->nullable()->after('image'); 

        });
        
    } 

            

            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
