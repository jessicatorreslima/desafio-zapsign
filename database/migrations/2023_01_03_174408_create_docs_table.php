<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false)->change();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('last_updated_at')->nullable()->useCurrentOnUpdate();
            $table->dateTime('date_limit_to_sign');
            $table->boolean('signed')->default(false);
            $table->foreignId('company')->constrained('companies', 'id');
            $table->foreignId('created_by')->constrained('users', 'id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs');
    }
}
