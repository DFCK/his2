<?php
class Person extends Eloquent{
    protected $table = 'dfck_person';
    protected $fillable = array(
        'pid', 'lastname', 'firstname','sex','dob','yob',
        'address','province','district','addressward',
        'doituong','insurancecode','insurancefromdate','insurancetodate','insurancecompany',
        'avatar','country','route','cmnd','dateissue','placeissue',
        'careercode','ethinic','blood','phone','email',
        'relative','relativephone','relativeaddress','relativetype'
    );
}