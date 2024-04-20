<?php

use App\Models\Doctor;
use App\Models\Specialist;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("registration_no")->nullable();
            $table->string("registration_date")->nullable();
            $table->tinyInteger("referral")->default(0)->comment("1 = yes 0=no");
            $table->string("referred_by")->nullable();
            $table->enum("patient_type", ["inPatient", "outPatient"]);
            $table->string("title")->nullable();
            $table->string("name")->nullable();
            $table->integer("age")->default(0);
            $table->date("dob")->nullable();
            $table->enum("gender", ["Male", "Female", "Not to Say"]);
            $table->enum("marital_status", ["single", "married", "divorce"])
                ->nullable();
            $table->string("blood_group")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("phone")->unique()->nullable();
            $table->integer("religion")->nullable();
            $table->string("occupation")->nullable();
            $table->string("country")->nullable();

            $table->string("home_phone")->nullable();
            $table->string("father_name")->nullable();
            $table->string("mother_name")->nullable();
            $table->string("father_phone")->nullable();
            $table->string("mother_phone")->nullable();
            $table->text("home_address")->nullable();
            $table->text("father_address")->nullable();
            $table->text("mother_address")->nullable();

            // next of kind
            $table->string("next_to_kin_phone")->nullable();
            $table->string("next_to_kin_email")->nullable();
            $table->text("next_to_kin_address")->nullable();
            $table->tinyInteger("same_a_patient")->nullable()->default(0);


            // payment method
            $table->string("payment_method")->default("cash");
            $table->text("symptoms")->nullable();
            $table->string("image")->nullable();

            $table->foreignIdFor(User::class)->constrained()
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
        Schema::dropIfExists('patients');
    }
};
