<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('direction_left_id')->unsigned();
            $table->foreign('direction_left_id')->references('id')->on('directions')->onDelete('cascade');
            $table->integer('direction_right_id')->unsigned();
            $table->foreign('direction_right_id')->references('id')->on('directions')->onDelete('cascade');         
            $table->timestamps();
        });

        $idl= DB::table('directions')->insertGetId(
            array('description' => 'Extraversion', 'meaning' => 'E', 'created_at' => \Carbon\Carbon::now())
        );
        $idr = DB::table('directions')->insertGetId(
            array('description' => 'Introversion', 'meaning' => 'I', 'created_at' => \Carbon\Carbon::now())
        );
        DB::table('dimensions')->insert(
            array('direction_left_id' => $idl, 'direction_right_id' => $idr, 'created_at' => \Carbon\Carbon::now())
        );

        $idl= DB::table('directions')->insertGetId(
            array('description' => 'Sensing', 'meaning' => 'S', 'created_at' => \Carbon\Carbon::now())
        );
        $idr = DB::table('directions')->insertGetId(
            array('description' => 'Intuition', 'meaning' => 'N', 'created_at' => \Carbon\Carbon::now())
        );
        DB::table('dimensions')->insert(
            array('direction_left_id' => $idl, 'direction_right_id' => $idr, 'created_at' => \Carbon\Carbon::now())
        );

        $idl= DB::table('directions')->insertGetId(
            array('description' => 'Thinking', 'meaning' => 'T', 'created_at' => \Carbon\Carbon::now())
        );
        $idr = DB::table('directions')->insertGetId(
            array('description' => 'Feeling', 'meaning' => 'F', 'created_at' => \Carbon\Carbon::now())
        );
        DB::table('dimensions')->insert(
            array('direction_left_id' => $idl, 'direction_right_id' => $idr, 'created_at' => \Carbon\Carbon::now())
        );

        $idl= DB::table('directions')->insertGetId(
            array('description' => 'Judging', 'meaning' => 'J', 'created_at' => \Carbon\Carbon::now())
        );
        $idr = DB::table('directions')->insertGetId(
            array('description' => 'Perceiving', 'meaning' => 'P', 'created_at' => \Carbon\Carbon::now())
        );
        DB::table('dimensions')->insert(
            array('direction_left_id' => $idl, 'direction_right_id' => $idr, 'created_at' => \Carbon\Carbon::now())
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dimensions');
    }
}
