<?php
class EmployeePosition extends Eloquent{
    protected $table = 'dfck_employee_position';
    protected $fillable = array('name','code','lang');
}