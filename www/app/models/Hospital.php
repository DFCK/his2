<?php
class Hospital extends Eloquent{
    protected $table = 'dfck_hospital';
    protected $fillable = array('name','namevn','code','dkbd','tuyenhanhchinh','tuyenyte','tuyenbenhvien','country','province','district','addressward','address');
}