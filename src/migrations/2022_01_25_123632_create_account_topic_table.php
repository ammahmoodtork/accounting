<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_topic', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('code');
            $table->double('min_debtor' , 20 , 8);
            $table->double('min_creditor' , 20 , 8);
            $table->double('max_debtor' , 20 , 8);
            $table->double('max_creditor' , 20 , 8);
            $table->bigInteger('year_id');
            $table->bigInteger('topic_group_id');
            $table->bigInteger('topic_source_id');
            $table->bigInteger('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_topic');
    }
}
