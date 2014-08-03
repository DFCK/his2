<?php
class Room extends Eloquent{
    protected $table = 'dfck_hospital_room';
    protected $fillable = array('name','code','bed','hospital_code','dept_code','ward_code');
    protected $softDelete = true;

    public static function getOutpatientRoom($hospital,$dept,$ward='',$pid=''){
        $findperson = "r.id";
        $room = DB::table('dfck_hospital_room AS r')
            ->join('dfck_hospital_ward AS w','w.code','=','r.ward_code')
            ->join('dfck_hospital_department AS d','d.code','=','r.dept_code')
            ->where('w.hospital_code',$hospital)
            ->where('w.dept_code',$dept);
        if($ward!='') $room = $room->where('w.ward_code',$ward);
        if($pid!='')
            $findperson = DB::raw( "(SELECT COUNT(rq.id) FROM dfck_radt_queue rq
            WHERE rq.pid=$pid AND rq.eid IS NULL AND rq.room_code = r.code
            AND rq.hospital_code = r.hospital_code AND rq.dept_code = r.dept_code ) AS inroom ");
        $room = $room->where('w.type','ngt')
            ->select('r.*','w.name AS wardname','d.name AS deptname',$findperson)
            ->orderby('w.name')
            ->orderby('r.name')
            ->get();
        return $room;
    }

}