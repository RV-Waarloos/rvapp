<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_member_onboardings', function (Blueprint $table) {
            $table->id();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');

            $table->foreignId('department_id')->nullable()->constrained('departments', 'id')
                ->nullOnDelete()->cascadeOnUpdate();

            $table->foreignId('initiator_id')->nullable()->constrained('users', 'id')
                ->nullOnDelete()->cascadeOnUpdate();

            $table->foreignId('subject_id')->nullable()->constrained('users', 'id')
                ->nullOnDelete()->cascadeOnUpdate();

            $table->string('status', 32)->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_member_onboardings');
    }
};
