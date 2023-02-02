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
            $table->string('name', 255)->nullable(false)->change();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('last_updated_at')->nullable()->useCurrentOnUpdate();
            $table->string('locale', 50)->default('-03:00');
            $table->enum('lang', ['pt', 'es', 'en'])->default('pt');
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
