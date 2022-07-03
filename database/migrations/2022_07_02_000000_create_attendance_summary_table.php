<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table_name='attendance_summary';

    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->integer('attendance_no')->comment('考勤机人员编号')->index();
            $table->tinyInteger('ot_count')->default(0)->comment('本月加班天数');
            $table->time('ot_hours')->default(0)->comment('本月加班时长');
            $table->tinyInteger('full_attendance')->default(0)->comment('是否全勤');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `$this->table_name` comment '考勤月结'");

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
