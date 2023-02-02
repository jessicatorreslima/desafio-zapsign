<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 255)->nullable(false)->change();
            $table->dateTime('last_password_redefinition_at')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->string('password', 255)->nullable(false)->change();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('last_updated_at')->nullable()->useCurrentOnUpdate();
            $table->foreignId('company_id')->constrained('companies', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
