<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('is_admin')->nullable();
            $table->string('full_name')->nullable();
			$table->string('date_of_birth')->nullable();
			$table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
			/*$table->integer('department_id')->nullable();*/
			$table->string('nationality')->nullable();
            $table->string('address')->nullable();
			$table->string('suburb')->nullable();
			$table->string('employment')->nullable();
			$table->string('occupation')->nullable();
			$table->string('tither')->nullable();
			$table->string('weekly_tither')->nullable();
			$table->string('monthly_tither')->nullable();
			$table->string('marital_status')->nullable();
			$table->string('weeding_date')->nullable();
			$table->string('born_again')->nullable();
			$table->string('baptized')->nullable();
			$table->string('tongues')->nullable();
			$table->string('sunday_attendance')->nullable();
			$table->string('bible_study')->nullable();
			$table->string('tuesday_service')->nullable();
			$table->string('friday_prayers')->nullable();
			$table->string('night_vigil')->nullable();
			$table->string('pregnant')->nullable();
			$table->string('delivery_date')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
			// $table->bigIncrements('id');
            // $table->integer('is_admin')->nullable();
            // $table->string('full_name')->nullable();
            // $table->string('gender')->nullable();
            // $table->string('email')->nullable();
            // $table->string('date_of_birth')->nullable();
            // $table->string('address')->nullable();
            // $table->string('location')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
