<?php
class Ward extends Eloquent{
    protected $softDelete = true;
    protected $table = 'dfck_hospital_ward';
    protected $fillable = array('code','name','type','dept_code','hospital_code');
}