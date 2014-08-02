<?php
class EmployeePositionRole extends Eloquent{
    protected $table='dfck_employee_position_role';
    protected $fillable = array('function_code','position_code','role');
}