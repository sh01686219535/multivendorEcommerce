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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('thumb_image');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subCategory_id')->nullable();
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('childCategory_id')->nullable();
            $table->foreign('childCategory_id')->references('id')->on('child_categories')->onDelete('cascade');
            $table->unsignedBigInteger('banner_id');
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->string('qty');
            $table->text('short_description');
            $table->string('long_description');
            $table->string('video_link')->nullable();
            $table->string('sku')->nullable();
            $table->string('price');
            $table->string('offer_price')->nullable();
            $table->string('offer_start_date')->nullable();
            $table->string('offer_end_date')->nullable();
            $table->string('productType')->nullable();
            $table->string('status');
            $table->string('is_approved')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
