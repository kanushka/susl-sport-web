<?php

use App\Models\Sport;
use App\Models\User;
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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('sports')->insert([
            ['name' => 'Tennis'],
            ['name' => 'Karate'],
            ['name' => 'Badminton'],
            ['name' => 'Chess'],
            ['name' => 'Carrom'],
            ['name' => 'Rugger'],
            ['name' => 'Cricket'],
            ['name' => 'Kabadi'],
            ['name' => 'Football'],
        ]);

        Schema::create('sport_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Sport::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
