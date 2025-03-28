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
            // **REMOVE or COMMENT OUT this line - designation_id is already nullable**
            // $table->unsignedBigInteger('designation_id')->nullable()->change();

            // **Keep ONLY this part to add the foreign key constraint**
            $table->foreign('designation_id')
                ->references('id')
                ->on('designations')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['designation_id']);
            // **In down(), we only need to drop the foreign key, not the column itself.**
            //  Leave this as is:
            // $table->dropColumn('designation_id');
        });
    }
};
