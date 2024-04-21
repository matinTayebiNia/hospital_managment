<?php

use App\Models\BillingInvoice;
use App\Models\PatientVisit;
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
        Schema::create('billing_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("payment_amount")->default(0);
            $table->tinyInteger("mood")->default(0);
            $table->tinyInteger("status")->default(0);
            $table->foreignIdFor(PatientVisit::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(BillingInvoice::class)->nullable()->constrained()
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
        Schema::dropIfExists('billing_transactions');
    }
};
