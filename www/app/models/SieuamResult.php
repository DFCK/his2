<?php
class SieuamResult extends Eloquent{
    protected  $table ='dfck_ris_sieuam_result';
    protected $fillable = array('hospital_code','pid','eid','request_id',
    'type','position','positionname','textresult','image1','image2',
    'daterequest','date');
}