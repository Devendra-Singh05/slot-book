<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('firm_name')->unique();
            $table->string('firm_mobile');
            $table->string('firm_email')->default(null);
            $table->string('business_type');
            $table->date('since')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');  
            $table->string('pan_no')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('map')->nullable();
            $table->string('profilepic')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firms');
    }
};