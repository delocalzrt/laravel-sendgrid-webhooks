<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoryColumnToArray extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('sendgrid_webhook_events', function (Blueprint $table) {
                $table->jsonb('categories')->nullable();
                $table->index([DB::raw('categories(767)')], 'categories_index');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sendgrid_webhook_events', function (Blueprint $table) {
            $table->dropColumn(['categories']);
        });
    }
}
