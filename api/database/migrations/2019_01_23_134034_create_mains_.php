<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('roleId');
            $table->string('roleName');
            $table->tinyInteger('status');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('permissionId');
            $table->tinyInteger('roleId');
            $table->foreign('roleId')->references('roleId')->on('role')->onDelete('set null');
            $table->string('rules');
            $table->tinyInteger('status');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('verifiedAt')->nullable();
            $table->tinyInteger('userType');
            $table->tinyInteger('status');
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
        
        Schema::create('passwords', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->tinyInteger('status');
            $table->tinyInteger('roleId');
            $table->foreign('roleId')->references('roleId')->on('role')->onDelete('set null');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('moduleId');
            $table->string('moduleName');
            $table->string('prefix');
            $table->tinyInteger('status');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mains_');
    }
}
