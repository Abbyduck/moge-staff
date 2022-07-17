<?php
/**
 * "{list_name}=[
 *      "{table.field_name}"=>[]
 * ]"
 */
return
    [
        'staff_list' => [
            'attendance_no' => ['type' => 'text','sortable'=>1],
            'name' => ['type' => 'text','sortable'=>1],
            'department' => ['type' => 'text','sortable'=>'department_id'],
            'entry_years' => ['type' => 'text','sortable'=>'entry_date'],
            'birthday' => ['type' => 'text','sortable'=>1],
            'action' => ['edit','del']
        ],
    ];
