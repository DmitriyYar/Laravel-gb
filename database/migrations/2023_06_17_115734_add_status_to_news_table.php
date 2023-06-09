<?php

declare(strict_types=1);

use App\Emums\NewsStatus;
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
        Schema::table('news', static function (Blueprint $table) {
            $table->enum('status', NewsStatus::all())->after('author');

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', static function (Blueprint $table) {
           $table->dropColumn('status');
        });
    }
};
