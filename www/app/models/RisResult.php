<?php
class RisResult extends Eloquent{
    protected  $table ='dfck_ris_result';
    protected $fillable = array('hospital_code','pid','eid','request_id',
    'type','position','positionname','textresult','images',
    'daterequest','date');
}