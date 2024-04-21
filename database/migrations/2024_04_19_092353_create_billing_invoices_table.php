<?php

use App\Models\BillingInvoice;
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
        Schema::create('billing_invoices', function (Blueprint $table) {
            $table->id();
            $table->string("invoice_number");
            $table->integer("total")->default(0);
            $table->integer("pending_amount")->default(0);
            $table->integer("payment_amount")->default(0);
            $table->tinyInteger("mood")->default(0);
            $table->string("note")->nullable();
            $table->string("discount_type")->nullable();
            $table->integer("discount_amount")->default(0);
            $table->string("discount_note")->nullable();
            $table->integer("tax")->default(0);
            $table->integer("additional_fee")->default(0);
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('billing_invoices');
    }
};
