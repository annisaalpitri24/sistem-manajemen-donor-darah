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
        Schema::create('donation_records', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donor_id')
                ->constrained('blood_donors')
                ->onDelete('cascade');

            $table->date('donation_date');

            $table->string('location', 200);

            $table->integer('amount_ml')
                ->default(450);

            $table->string('blood_pressure', 20)
                ->nullable();

            $table->decimal('hemoglobin', 4, 1)
                ->nullable();

            $table->string('officer_name', 100)
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_records');
    }
};
