<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendgridWebhookEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sendgrid_webhook_events');
        Schema::create('sendgrid_webhook_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->timestamp('timestamp')->nullable();
            $table->string('email')->index();
            $table->string('event')->index();
            $table->string('sg_event_id')->unique();
            $table->string('sg_message_id')->nullable()->index();
            $table->jsonb('payload');
            $table->jsonb('category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sendgrid_webhook_events');
    }
}
