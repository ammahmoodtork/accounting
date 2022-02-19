<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_setting', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->string('char');
            $table->bigInteger('len_g');
            $table->bigInteger('len_k');
            $table->bigInteger('len_m');
            $table->bigInteger('len_m2');
            $table->bigInteger('len_t1');
            $table->bigInteger('len_t2');
            $table->bigInteger('len_t3');
            $table->boolean('add_gr_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_setting');
    }
}
