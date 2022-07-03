<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->integer('attendance_no')->comment('考勤机人员编号')->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password',32)->default(md5('123456'));
            $table->integer('department_id')->comment('部门id');
            $table->timestamp('entry_date')->comment('入职时间')->nullable();
            $table->tinyInteger('gender')->comment('性别')->nullable();
            $table->date('birthday')->comment('生日')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
