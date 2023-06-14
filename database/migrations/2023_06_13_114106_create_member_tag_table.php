<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTagTable extends Migration
{
    public function up()
    {
        Schema::create('member_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade');
            $table->primary(['member_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_tag');
    }
}
