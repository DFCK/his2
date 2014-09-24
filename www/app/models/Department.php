<?php
class Department extends Eloquent{
    protected $softDelete = true;
    protected $table = 'dfck_hospital_department';
    protected $fillable = array('code','name','ref_code','hospital_code');

    public static function getDeptInfo($hospital,$deptcode){
        $fromdate = strtotime(date("d-m-Y 00:00:00"));
        $todate = strtotime(date("d-m-Y 23:59:59"));
        $dept = DB::table('dfck_hospital_department AS d')
            ->where('d.hospital_code',$hospital)
            ->where('d.code',$deptcode);

        $countwait = DB::raw(" (SELECT COUNT(rq2.id)  FROM dfck_radt_queue rq2
        WHERE rq2.hospital_code = d.hospital_code AND rq2.dept_code = d.code
        AND rq2.eid = 0
        AND rq2.date >= $fromdate AND rq2.date <= $todate) AS wait ");
        $countfin = DB::raw(" (SELECT COUNT(rq2.id)  FROM dfck_radt_queue rq2
        WHERE rq2.hospital_code = d.hospital_code AND rq2.dept_code = d.code
        AND rq2.eid > 0
        AND rq2.date >= $fromdate AND rq2.date <= $todate) AS finish ");
        $dept = $dept->select('d.*',$countwait,$countfin)
            ->first();
        return $dept;
    }
}