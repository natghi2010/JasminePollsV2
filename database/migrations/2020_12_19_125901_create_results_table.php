<?php

use App\Enums\AreaTypeEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->string('question_type');
            $table->enum('type',AreaTypeEnums::getAll());
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('subcity_id')->nullable();
            $table->unsignedBigInteger('wereda_id')->nullable();
            $table->integer('week')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        //add index
        Schema::table('results', function (Blueprint $table) {
            $table->index('question_id');
            $table->index('question_type');
            $table->index('type');
            $table->index('sector_id');
            $table->index('city_id');
            $table->index('subcity_id');
            $table->index('wereda_id');
            $table->index('week');
            $table->index('month');
            $table->index('year');
            $table->index('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
