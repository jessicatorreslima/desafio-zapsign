<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('last_updated_at')->nullable()->useCurrentOnUpdate();
            $table->string('timezone', 50)->default('-03:00');
            $table->enum('lang', ['pt', 'es', 'en'])->default('pt');
            $table->foreignId('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
