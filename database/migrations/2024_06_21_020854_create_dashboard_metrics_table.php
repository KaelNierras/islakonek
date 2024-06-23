<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardMetricsTable extends Migration
{
    public function up()
    {
        Schema::create('dashboard_metrics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_contacts')->default(0);
            $table->timestamps();
            $table->softDeletes();  // Add this line
        });
    }

    public function down()
    {
        Schema::dropIfExists('dashboard_metrics');
    }
}
