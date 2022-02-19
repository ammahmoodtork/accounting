<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDocumentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_document_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('doc_id');
            $table->bigInteger('topic_id');
            $table->bigInteger('detailed_id');
            $table->bigInteger('child_id')->nullable();
            $table->text('des');
            $table->double('debtor' , 20 , 8);
            $table->double('creaditor' , 20 , 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_document_details');
    }
}
