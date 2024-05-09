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
        Schema::create('members', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("name");
            $table->string("address");
            $table->string("member_code");
            $table->integer('no_hp');
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
