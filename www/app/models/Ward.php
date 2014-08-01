<?php
class Ward extends Eloquent{
    protected $table = 'dfck_hospital_ward';
    protected $fillable = array('code','name','type','dept_code','hospital_code');
}