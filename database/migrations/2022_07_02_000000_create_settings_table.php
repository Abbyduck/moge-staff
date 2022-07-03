<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table_name='settings';

    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->time('sign_in_time')->comment('上班时间');
            $table->time('sign_out_time')->comment('下班时间');
            $table->time('lunch_time_begin')->comment('午休开始时间');
            $table->time('lunch_time_end')->comment('下午上班开始时间');
            $table->time('ot_begin')->comment('加班开始时间');
            $table->time('ot_count_time')->comment('计算加班时长直到这个时间');
            $table->tinyInteger('monthly_late_max')->comment('全勤最多迟到次数');
            $table->time('monthly_late_hours')->comment('全勤最多迟到时长');
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
        Schema::dropIfExists($this->table_name);
    }
}
