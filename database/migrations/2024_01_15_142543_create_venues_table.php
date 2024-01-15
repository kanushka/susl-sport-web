<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity')->default(0);
            $table->timestamps();
        });

        DB::table('venues')->insert([
            ['name' => 'Playground', 'capacity' => 500],
            ['name' => 'Swimming Pool', 'capacity' => 100],
            ['name' => 'Gymnasium', 'capacity' => 100],
            ['name' => 'Indoor Stadium', 'capacity' => 200],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
