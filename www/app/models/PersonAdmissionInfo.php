<?php
class PersonAdmissionInfo extends Eloquent{
    protected $table='dfck_person_admissioninfo';
    protected $fillable = array('pid','date','by','refdiagnosis','reason',
        'status','personhistory','familyhistory','process','eid');
}