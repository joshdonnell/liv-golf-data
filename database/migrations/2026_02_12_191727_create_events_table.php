<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table): void {
            $table->id();
            $table->string('third_party_id')->unique();
            $table->string('event_name');
            $table->string('venue');
            $table->string('venue_country');
            $table->string('poster')->nullable();
            $table->text('result')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->foreignId('season_id')->constrained('seasons');
            $table->timestamps();
        });
    }
};
