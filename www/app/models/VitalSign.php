<?php

class VitalSign extends Eloquent
{
    protected $table = 'dfck_person_vitalsigns';
    protected $fillable = array('date','pid', 'eid', 'height', 'weight', 'bloodpressure', 'heartbeat', 'breathing', 'staff','temperature');
    protected $softDelete = true;
}