<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('category_id');
            $table->string('title');
            $table->text('description');
            $table->string('city');
            $table->decimal('salary', 10,2);
            $table->boolean('match')->nullable();
            $table->boolean('transport')->nullable();
            $table->boolean('health')->nullable();
            $table->boolean('food')->nullable();
            $table->boolean('snack')->nullable();
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
