<?php
class RISRequest extends Eloquent{
    protected $table='dfck_ris_request';
    protected $fillable = array('hospital_code','pid','eid','date','position','type',
    'diduoc','diung','cuonggiap','mangthai','lamsang','note','staff','status','created_by');
    protected $softDelete = true;

    /**
     * status: 0: dang cho, 1: da co ket qua
     */
}