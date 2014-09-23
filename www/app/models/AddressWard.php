<?php
class AddressWard extends Eloquent{
    protected $table = "dfck_address_ward";
    protected $fillable = array('name','code','district_code');
}