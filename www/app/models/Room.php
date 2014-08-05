<?php
class Room extends Eloquent{
    protected $table = 'dfck_hospital_room';
    protected $fillable = array('name','code','bed','hospital_code','dept_code','ward_code');
    protected $softDelete = true;

    public static function getOutpatientRoom($hospital,$dept,$ward='',$pid=''){

        $fromdate = strtotime(date("d-m-Y 00:00:00"));
        $todate = strtotime(date("d-m-Y 23:59:59"));
        $findperson = "r.id";
        $room = DB::table('dfck_hospital_room AS r')
            ->join('dfck_hospital_ward AS w','w.code','=','r.ward_code')
            ->join('dfck_hospital_department AS d','d.code','=','r.dept_code')
            ->where('w.hospital_code',$hospital)
            ->where('w.dept_code',$dept);
        if($ward!='') $room = $room->where('w.ward_code',$ward);
        if($pid!='')
            $findperson = DB::raw( "(SELECT COUNT(rq.id) FROM dfck_radt_queue rq
            WHERE rq.pid=$pid AND rq.eid = 0 AND rq.room_code = r.code
            AND rq.hospital_code = r.hospital_code AND rq.dept_code = r.dept_code
            AND rq.date >= $fromdate AND rq.date <= $todate) AS inroom ");
        $countwait = DB::raw(" (SELECT COUNT(rq2.id)  FROM dfck_radt_queue rq2
        WHERE rq2.hospital_code = r.hospital_code
        AND r.code = rq2.room_code AND rq2.eid = 0
        AND rq2.date >= $fromdate AND rq2.date <= $todate) AS wait ");
        $countfin = DB::raw(" (SELECT COUNT(rq2.id)  FROM dfck_radt_queue rq2
        WHERE rq2.hospital_code = r.hospital_code
        AND r.code = rq2.room_code AND rq2.eid > 0
        AND rq2.date >= $fromdate AND rq2.date <= $todate) AS finish ");
        $room = $room->where('w.type','ngt')
            ->select('r.*','w.name AS wardname','d.name AS deptname',$findperson,$countwait,$countfin)
            ->orderby('w.name')
            ->orderby('r.name')
            ->get();
        return $room;
    }

}