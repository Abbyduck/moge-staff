<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table_name='attendances';

    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->integer('attendance_no')->comment('考勤机人员编号')->index();
            $table->dateTime('sign_in')->nullable()->index();
            $table->dateTime('sign_out')->nullable()->index();
            $table->time('ot_time')->nullable()->index();
            $table->date('work_date')->index();
            $table->tinyInteger('ot_count')->index();
            $table->tinyInteger('is_holiday')->index()->comment('0: 工作日，1：周末，2：节假日');
            $table->string('remark');
            $table->integer('ot_for')->comment('加班项目');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `$this->table_name` comment '考勤记录'");

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
