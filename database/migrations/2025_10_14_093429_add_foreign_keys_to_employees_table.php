<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan foreign key departemen_id dan jabatan_id ke tabel employees.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Tambah kolom baru
            $table->unsignedBigInteger('departemen_id')->after('tanggal_masuk');
            $table->unsignedBigInteger('jabatan_id')->after('departemen_id');

            // Tambahkan foreign key
            $table->foreign('departemen_id')
                  ->references('id')
                  ->on('departments')   // pastikan pakai nama tabel 'departments', bukan 'departemens'
                  ->onDelete('cascade');

            $table->foreign('jabatan_id')
                  ->references('id')
                  ->on('positions')
                  ->onDelete('cascade');
        });
    }

    /**
     * Menghapus foreign key dan kolom yang ditambahkan.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn(['departemen_id', 'jabatan_id']);
        });
    }
};
