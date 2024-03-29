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
        Schema::create('rent_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone_number')->unique();
            $table->string('price');
            $table->integer('floor_number')->nullable();
            $table->integer('room_number')->nullable();
            $table->integer('deposited_money');
            $table->string('contract_plan');
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_offices');
    }
};
