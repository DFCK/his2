<?php
class Employeetitle extends Eloquent{
    protected $table = 'dfck_employee_title';
    protected $fillable = array('name','code','lang','group');
}