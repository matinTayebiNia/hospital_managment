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
        Schema::create('sample_collections', function (Blueprint $table) {
            $table->id();
            $table->string("sample_code")->nullable();
            $table->dateTime("collect_date")->nullable();
            $table->dateTime("dispatch_date")->nullable();
            $table->dateTime("cancel_dispatch_date")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->foreignIdFor(\App\Models\Investigation::class)->nullable()->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Laboratories::class)->nullable()->constrained()
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
        Schema::dropIfExists('sample_collections');
    }
};
