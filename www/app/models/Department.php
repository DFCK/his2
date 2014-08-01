<?php
class Department extends Eloquent{
    protected $softDelete = true;
    protected $table = 'dfck_hospital_department';
    protected $fillable = array('code','name','ref_code','hospital_code');
}