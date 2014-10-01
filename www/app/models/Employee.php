<?php
class Employee extends Eloquent{
    protected $table = 'dfck_employee';
    protected $fillable = array('hospital_code','title','created_by','pid');
    protected $softDelete = true;
    public function person()
    {
        return $this->belongsTo('Person', 'pid', 'pid');
    }
    public function emptitle(){
        return $this->hasOne('Employeetitle','code','title');
    }
}