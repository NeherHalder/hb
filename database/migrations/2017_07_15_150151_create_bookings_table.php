<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no')->unique();
            $table->string('reason', 100);
            $table->string('hall_room', 100);
            $table->text('description')->nullable();
            $table->string('event_time', 100);
            $table->integer('no_of_guests');
            $table->string('chief_guest', 100);
            $table->string('main_guest', 100);
            $table->string('chair_of_the_event', 100);
            $table->string('applicant_name', 100);
            $table->string('nid_no');
            $table->string('id_type');
            $table->string('email_address', 100)->nullable();
            $table->string('mobile_no', 100);
            $table->text('address');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('bookings');
    }
}
