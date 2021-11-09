<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_instances', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('last_deployment_id');
            $table->string('domain');
            $table->string('nginx_conf_file');
            $table->string('access_log_file');
            $table->string('error_log_file');
            $table->string('project_dir');
            $table->string('db_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_instances');
    }
}
