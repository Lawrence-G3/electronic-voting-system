<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('candidates', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('party');
        $table->text('bio');
        $table->enum('status', ['active', 'inactive']);
        $table->foreignId('election_id')->constrained(); // Foreign key to election
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
