<?php
class PersonAdmissionInfo extends Eloquent{
    protected $softDelete = true;
    protected $table='dfck_person_admissioninfo';
    protected $fillable = array('hospital_code','pid','date','by','refdiagnosis','refplacecode','refplace','reason',
        'status','personhistory','familyhistory','process','eid','created_by');
}