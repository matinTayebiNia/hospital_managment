<?php

use App\Models\MedicineCategory;
use App\Models\MedicineType;
use App\Models\Supplier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->tinyInteger("type");

            //medicines
            $table->string("medicine_generic_name")->nullable();
            $table->string("medicine_unit")->nullable();
            $table->string("medicine_strength")->nullable();
            $table->string("medicine_shelf")->nullable();

            // quantity and price
            $table->string("quantity")->default(0);
            $table->string("quantity_type")->nullable();
            $table->string("price")->nullable();
            $table->date("expiration_date")->nullable();
            $table->string("note")->nullable();
            $table->string("image")->nullable();

            $table->tinyInteger("status")->default(0);
            $table->foreignIdFor(MedicineType::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(MedicineCategory::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Supplier::class)->nullable()->constrained()
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
        Schema::dropIfExists('purchases');
    }
};
