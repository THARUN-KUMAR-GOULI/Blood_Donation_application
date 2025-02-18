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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('name');
            $table->integer('age');
            $table->string('email');
            $table->string('bloodgroup');
            $table->string('contact');
            $table->string('city');
            $table->date('date');
            $table->string('time');

            $table->foreign('userid')->references('code')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
