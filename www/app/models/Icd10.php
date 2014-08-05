<?php
class Icd10 extends Eloquent{
    protected $table = 'dfck_icd10';
    protected $fillable = array('code','chapter_code','group_code','name','nameus','small-group');
}