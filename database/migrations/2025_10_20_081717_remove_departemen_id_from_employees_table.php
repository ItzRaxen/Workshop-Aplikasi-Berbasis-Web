<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Hapus foreign key dulu sebelum hapus kolom
            $table->dropForeign(['departemen_id']);
            $table->dropColumn('departemen_id');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('departemen_id')->nullable();

            // Tambahkan kembali relasi jika di-rollback
            $table->foreign('departemen_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
        });
    }
};
