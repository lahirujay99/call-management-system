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
        Schema::table('contacts', function (Blueprint $table) {
            // 1. Rename 'branch' to 'branch_id'
            $table->renameColumn('branch', 'branch_id');

            // 2. Make 'branch_id' an UNSIGNED BIG INTEGER
            $table->unsignedBigInteger('branch_id')->nullable()->change(); // Change existing column type and nullable status. Nullable to handle existing data gracefully

            // 3. Add foreign key constraint
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->nullOnDelete(); // Set to NULL if branch is deleted. Choose cascadeOnDelete if you want to delete contacts when branch deleted (CAREFUL!)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['branch_id']); // Drop foreign key first
            $table->renameColumn('branch_id', 'branch'); // Rename back to 'branch'
            $table->string('branch')->nullable()->change(); // Revert to string type.
        });
    }
};
