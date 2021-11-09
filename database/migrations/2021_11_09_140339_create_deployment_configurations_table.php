<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_configurations', function (Blueprint $table) {
            $table->id();
            $table->json('env_vars')->default('{}');
            $table->string('branch');
            $table->unsignedBigInteger('project_id');
            $table->string('domain');
            $table->boolean('auto_deployment')->default(false);
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
        Schema::dropIfExists('deployment_configurations');
    }
}
