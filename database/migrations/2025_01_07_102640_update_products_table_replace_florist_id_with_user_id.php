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
        Schema::table('products', function (Blueprint $table) {
//            $table->dropColumn('florist_id');
//            $table->unsignedBigInteger('user_id')->after('id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropColumn('user_id');
//            $table->unsignedBigInteger('florist_id')->after('id');

        });
    }
};
