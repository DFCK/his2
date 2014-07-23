<?php
class Countries extends Eloquent
{
    protected $table = 'dfck_icd10';
    protected $fillable = array('code2','code3','name','namevn');
}