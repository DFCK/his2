<?php
class News extends Eloquent{
    protected $table = 'dfck_news';
    protected $fillable = array('hospital_code','place','title','shortinfo','content','created_by','created_time');
    protected $softDelete = true;
}