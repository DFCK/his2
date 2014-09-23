<?php
class AddressDistrict extends Eloquent{
    protected $table = "dfck_address_district";
    protected $fillable = array('name','code','province_code');
}