<?php
class Adminfunction extends Eloquent{
    protected $table = 'dfck_function';
    protected $fillable = array('modulename', 'moduleurl','modulelang','moduleparent');
}