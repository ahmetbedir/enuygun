<?php

use App\Models\Developer;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Developer::class)->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->unsignedInteger('level')->default(0);
            $table->unsignedInteger('estimated_duration')->default(0);
            $table->unsignedInteger('complexity')->default(0);
            $table->unsignedInteger('developer_work_week')->default(0);
            $table->string('provider_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
