<?php
class Hospital extends Eloquent{
    protected $softDelete = true;
    protected $table = 'dfck_hospital';
    protected $fillable = array('name','namevn','code','dkbd','tuyenhanhchinh','tuyenyte','tuyenbenhvien','country','province','district','addressward','address');
}