<?php

use App\Models\Purchase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string("medicine_code")->nullable();
            $table->string("medicine_name")->nullable();
            $table->integer("medicine_price")->default(0);
            $table->text("description")->nullable();
            $table->integer("available_qty")->default(0);
            $table->integer("alert_qty")->default(0);

            $table->tinyInteger("status")->default(0);
            $table->foreignIdFor(Purchase::class)->nullable()->constrained()
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
        Schema::dropIfExists('medicines');
    }
};
