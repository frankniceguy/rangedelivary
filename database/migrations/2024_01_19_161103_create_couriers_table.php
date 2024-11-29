<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')
                ->references('id')
                ->on('senders')
                ->onDelete('cascade');
            $table->foreignId('recipient_id')
                ->references('id')
                ->on('recipients')
                ->onDelete('cascade');
            $table->string('tracking_id');
            $table->text('package_name');
            $table->integer('quantity');
            $table->string('parcel_weight');
            $table->string('parcel_color');
            $table->text('package_image')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->text('location')
                ->default(
                    `{
                            "lat": 38.868288566138204,
                            "lng": -77.09930419921876
                        }`
                );
            $table->string('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
            $table->string('carrier')
                ->default(env("APP_NAME") . " Logistics");
            $table->string('shipment_method');
            $table->string('payment_method');
            $table->string('shipping_address');
            $table->text('description');
            $table->timestamp('pickup_time')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
