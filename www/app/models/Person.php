<?php

class Person extends Eloquent
{
    protected $table = 'dfck_person';
    protected $fillable = array(
        'pid', 'lastname', 'firstname', 'sex', 'dob', 'yob',
        'address', 'province', 'district', 'addressward',
        'doituong', 'insurancecode', 'insurancefromdate', 'insurancetodate', 'insurancecompany', 'insuranceplace',
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
        if ($months <= 12) {
            return $months . " " . trans("pas.month") . ' ' . trans("pas.age");
        } else return (date("Y") - date("Y", $d1)) . " " . trans("pas.age");
    }

    public static function getPersonInfo($pid)
    {
        $fromdate = strtotime(date("d-m-Y")." 00:00:00");
        $todate = strtotime(date("d-m-Y")." 23:59:59");

        $person = DB::table('dfck_person AS p')
            ->join('dfck_address_ward AS w', 'w.code', '=', 'p.addressward')
            ->join('dfck_address_district AS d', 'd.code', '=', 'p.district')
            ->join('dfck_address_province AS pr', 'pr.code', '=', 'p.province')
            ->join('dfck_type_jobs AS j', 'j.code', '=', 'p.careercode')
            ->join('dfck_type_ethnic AS e', 'e.code', '=', 'p.ethnic')
            ->leftJoin('dfck_noicap_bhyt AS n', 'n.code', '=', 'p.insuranceplace')
            ->leftjoin('dfck_encounter AS en',function($join){
                $join->on('en.pid','=','p.pid')
                    ->Where('en.discharged','=',0);
            })
            ->leftjoin('dfck_person_vitalsigns AS v', function($join) use($fromdate,$todate){
                $join->on('v.pid','=','p.pid')
                     ->where('v.date','>=',$fromdate)
                     ->where('v.date','<=',$todate)
                    ->orOn('v.eid','=','en.eid');
            })
            ->leftjoin('dfck_person_admissioninfo AS i', function($join)  use($fromdate,$todate) {
                $join->on('i.pid','=','p.pid')
                    ->where('i.date','>=',$fromdate)
                    ->where('i.date','<=',$todate)
                    ->orOn('i.eid','=','en.eid');
            })

            ->where("p.pid", $pid)
            ->select('p.*', DB::raw(" IFNULL(en.eid,0) AS eid"),
                'pr.name AS province_name', 'd.name AS district_name', 'w.name AS ward_name', 'j.namevn AS career',
                'e.name AS ethnicname', 'n.name AS insurancename',DB::raw(" COUNT(v.id) AS numvitalsign "),DB::raw(" COUNT(i.id) AS numadmisinfo "))
            ->get();
        if ($person)
            return $person[0];
        else return null;
    }
}