<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_feeds', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->text('ShortDetails');
            $table->string('Author');
            $table->date('DatePublish');
            $table->string('LastUpdatedBy');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_feeds');
    }
}
