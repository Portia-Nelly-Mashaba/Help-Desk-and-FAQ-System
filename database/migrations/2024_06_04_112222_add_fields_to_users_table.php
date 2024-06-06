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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email_verified_at');
            $table->string('address')->nullable()->after('phone');
            $table->boolean('is_admin')->default(0)->after('address');
            $table->boolean('is_deleted')->default(0)->after('is_admin');
            $table->boolean('is_verified')->default(0)->after('is_deleted');
            $table->boolean('is_banned')->default(0)->after('is_verified');
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address', 'is_admin', 'is_deleted', 'is_verified', 'is_banned']);
        });
    }
};
