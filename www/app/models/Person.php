<?php
class Person extends Eloquent
{
    protected $table = 'dfck_person';
    protected $fillable = array(
        'pid', 'lastname', 'firstname', 'sex', 'dob', 'yob',
        'address', 'province', 'district', 'addressward',
        'doituong', 'insurancecode', 'insurancefromdate', 'insurancetodate', 'insurancecompany',
        'avatar', 'country', 'route', 'cmnd', 'dateissue', 'placeissue',
        'careercode', 'ethinic', 'blood', 'phone', 'email',
        'relative', 'relativephone', 'relativeaddress', 'relativetype'
    );

    public static function  calMonthAge($d1)
    {
        $months = (date('Y') - date('Y', $d1)) * 12;
        $months -= date('m', $d1);
        $months += date('m') + 1;
//        return $months <= 0 ? 0 : $months;
        if($months <= 12){
            return $months." ".trans("pas.month");
        }
        else return (date("Y") - date("Y",$d1))." ".trans("pas.age");
    }
}