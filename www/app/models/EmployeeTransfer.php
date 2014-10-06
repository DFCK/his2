<?php
class EmployeeTransfer extends Eloquent{
    protected $table = 'dfck_employee_transfer';
    protected $fillable = array('pid','empid',
        'hospital_code','dept_code','ward_code','room_code',
        'position_code','title','titlegroup','created_by');
    protected $softDelete = true;
}