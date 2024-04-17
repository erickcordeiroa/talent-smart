<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs',function(Blueprint $table){
            $table->dropColumn('transport');
            $table->dropColumn('health');
            $table->dropColumn('food');
            $table->dropColumn('snack');
            $table->dropColumn('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs',function(Blueprint $table){
            $table->boolean('transport')->nullable();
            $table->boolean('health')->nullable();
            $table->boolean('food')->nullable();
            $table->boolean('snack')->nullable();
            $table->string('tags')->nullable();
        });
    }
}
