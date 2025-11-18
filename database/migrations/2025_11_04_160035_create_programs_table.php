<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
  Schema::create('programs', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->timestamps();
    $table->softDeletes(); // <--- ini
});

}

public function down()
{
    Schema::dropIfExists('programs');
}

};
