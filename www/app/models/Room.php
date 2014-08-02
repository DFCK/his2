<?php
class Room extends Eloquent{
    protected $table = 'dfck_hospital_room';
    protected $fillable = array('name','code','bed','hospital_code','dept_code','ward_code');
    protected $softDelete = true;
}