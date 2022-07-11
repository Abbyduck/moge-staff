<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Staffs
 *
 * @property int $id
 * @property int $attendance_no 考勤机人员编号
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $department_id 部门id
 * @property string|null $entry_date 入职时间
 * @property int|null $gender 性别
 * @property string|null $birthday 生日
 * @method static \Database\Factories\StaffsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereAttendanceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staffs wherePassword($value)
 * @mixin \Eloquent
 */
class Staffs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $casts = [
//        'birthday' => 'date',
//        'entry_date' => 'date',
    ];

}
