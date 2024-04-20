<?php

use App\Models\Medicine;
use App\Models\Patient;
use App\Models\PatientVisit;
use App\Models\User;
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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->string("systolic_B_P")->nullable();
            $table->string("diastolic_B_P")->nullable();
            $table->string("temperature")->nullable();
            $table->string("weight")->nullable();
            $table->string("height")->nullable();
            $table->string("bmi")->nullable();
            $table->string("respiratory")->nullable();
            $table->string("heart_rate")->nullable();
            $table->string("urine_output")->nullable();
            $table->string("blood_sugar_f")->nullable();
            $table->string("spo_2")->nullable();
            $table->string("avpu")->nullable();
            $table->string("trauma")->nullable();
            $table->string("mobility")->nullable();
            $table->string("oxygen_supplementation")->nullable();
            $table->string("comment")->nullable();

            $table->foreignIdFor(Patient::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(PatientVisit::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Medicine::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("created_by_id")->constrained("users")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("updated_by_id")->constrained("users")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
