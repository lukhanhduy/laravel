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
        Schema::create('files', function (Blueprint $table) {
            $table->increments('fileId');
            $table->string('filePath');
            $table->string('fileName');
            $table->string('mimeType');
            $table->string('fileSize');
            $table->boolean('isLocale');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('roleId');
            $table->string('roleName');
            $table->tinyInteger('status');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('permissionId');
            $table->unsignedInteger('roleId');
            $table->foreign('roleId')->references('roleId')->on('roles')->onDelete('cascade');
            $table->json('rules');
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
            $table->integer('userType');
            $table->tinyInteger('status');
            $table->unsignedInteger('avatar')->nullable();;
            $table->foreign('avatar')->references('fileId')->on('files')->onDelete('set null');
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
            $table->unsignedInteger('roleId');
            $table->unsignedInteger('avatar')->nullable();;
            $table->foreign('avatar')->references('fileId')->on('files')->onDelete('set null');
            $table->foreign('roleId')->references('roleId')->on('roles')->onDelete('cascade');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->increments('moduleId');
            $table->string('moduleName');
            $table->string('prefix');
            $table->tinyInteger('status');
            $table->string('slug');
            $table->unsignedInteger('icon')->nullable();;
            $table->foreign('icon')->references('fileId')->on('files')->onDelete('set null');
            $table->unsignedInteger('parentId');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('categoryId');
            $table->string('categoryName');
            $table->string('slug');
            $table->unsignedInteger('icon')->nullable();;
            $table->foreign('icon')->references('fileId')->on('files')->onDelete('set null');
            $table->tinyInteger('status');
            $table->unsignedInteger('parentId');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('passwords');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('categories');
    }
}
