<?php
class RadtQueue extends Eloquent{
    protected $table='dfck_radt_queue';
    protected $fillable = array('pid','hospital_code','dept_code','ward_code','room_code','eid');
    protected $softDelete = true;

    public static function getCurrentRoom($room){

    }
}