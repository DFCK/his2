<?php
class Employee extends Eloquent{
    protected $table = 'dfck_employee';
    protected $fillable = array('hospital_code','title','created_by','pid');
    protected $softDelete = true;
}