<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('order')->unsigned();
            $table->integer('dimension_id')->unsigned();
            $table->foreign('dimension_id')->references('id')->on('dimensions')->onDelete('cascade');
            $table->integer('direction');
            $table->timestamps();
        });

        $i = 1;
        DB::table('questions')->insert(
            array(
                array('description' => 'You find it takes effort to introduce yourself to other people.', 
                    'order' => $i++,
                    'dimension_id'=>1,
                    'direction'=>1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'You consider yourself more practical than creative.', 
                    'order' => $i++,
                    'dimension_id'=>2,
                    'direction'=>-1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'Winning a debate matters less to you than making sure no one gets upset.', 
                    'order' => $i++,
                    'dimension_id'=>3,
                    'direction'=>1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'You get energized going to social events that involve many interactions.', 
                    'order' => $i++,
                    'dimension_id'=>1,
                    'direction'=>-1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'You often spend time exploring unrealistic and impractical yet intriguing ideas.', 
                    'order' => $i++,
                    'dimension_id'=>2,
                    'direction'=>1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'Deadlines seem to you to be of relative rather than absolute importance.', 
                    'order' => $i++,
                    'dimension_id'=>4,
                    'direction'=>1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'Logic is usually more important than heart when it comes to making important decisions.', 
                    'order' => $i++,
                    'dimension_id'=>3,
                    'direction'=>-1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'Your home and work environments are quite tidy.', 
                    'order' => $i++,
                    'dimension_id'=>4,
                    'direction'=>-1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'You do not mind being at the center of attention.', 
                    'order' => $i++,
                    'dimension_id'=>1,
                    'direction'=>-1,
                    'created_at' => \Carbon\Carbon::now()
                ),
                array('description' => 'Keeping your options open is more important than having a to-do list.', 
                    'order' => $i++,
                    'dimension_id'=>4,
                    'direction'=>1,
                    'created_at' => \Carbon\Carbon::now()
                ),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
