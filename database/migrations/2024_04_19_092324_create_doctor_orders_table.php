<?php

use App\Models\PatientVisit;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_orders', function (Blueprint $table) {
            $table->id();
            $table->string("order_no")->nullable();
            $table->tinyInteger("order_type")->default(0);
            $table->foreignIdFor(PatientVisit::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("approved_by_id")->nullable()->constrained("users")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("created_by_id")->nullable()->constrained("users")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("updated_by_id")->nullable()->constrained("users")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_orders');
    }
};
