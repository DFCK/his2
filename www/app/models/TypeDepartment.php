<?php
class TypeDepartment extends Eloquent{
    protected $table='dfck_type_department';
    protected $fillable = array('name','lang','code','order','type');
}