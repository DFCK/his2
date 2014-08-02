<?php
class Person extends Eloquent
{
    protected $table = 'dfck_person';
    protected $fillable = array(
        'pid', 'lastname', 'firstname', 'sex', 'dob', 'yob',
        'address', 'province', 'district', 'addressward',
        'doituong', 'insurancecode', 'insurancefromdate', 'insurancetodate', 'insurancecompany','insuranceplace',
        'avatar', 'country', 'route', 'cmnd', 'dateissue', 'placeissue',
        'careercode', 'ethnic', 'blood', 'phone', 'email',
        'relative', 'relativephone', 'relativeaddress', 'relativetype'
    );

    public static function  calMonthAge($d1)
    {
        $months = (date('Y') - date('Y', $d1)) * 12;
        $months -= date('m', $d1);
        $months += date('m') + 1;
//        return $months <= 0 ? 0 : $months;
        if($months <= 12){
            return $months." ".trans("pas.month").' '.trans("pas.age");
        }
        else return (date("Y") - date("Y",$d1))." ".trans("pas.age");
    }
    public static function getPersonInfo($pid){
        $person = DB::table('dfck_person AS p')
            ->join('dfck_address_ward AS w', 'w.code', '=', 'p.addressward')
            ->join('dfck_address_district AS d', 'd.code', '=', 'p.district')
            ->join('dfck_address_province AS pr', 'pr.code', '=', 'p.province')
            ->join('dfck_type_jobs AS j', 'j.code', '=', 'p.careercode')
            ->join('dfck_type_ethnic AS e', 'e.code', '=', 'p.ethnic')
            ->leftJoin('dfck_noicap_bhyt AS n', 'n.code', '=', 'p.insuranceplace')
            ->where("p.pid", $pid)
            ->select('p.*', 'pr.name AS province_name', 'd.name AS district_name', 'w.name AS ward_name', 'j.namevn AS career',
                'e.name AS ethnicname', 'n.name AS insurancename')
            ->get();
        return $person;
    }
}