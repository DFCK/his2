<?php
class RadtQueue extends Eloquent{
    protected $table='dfck_radt_queue';
    protected $fillable = array('pid','hospital_code','dept_code','ward_code','room_code','eid','order','date');
//    protected $softDelete = true;

    public static function getCurrentRoom($hospital,$room,$date=""){
        if($date==""){
            $fromdate = strtotime(date("d-m-Y")." 00:00:00");
            $todate = strtotime(date("d-m-Y")." 23:59:59");
        }
        else{
            $fromdate = strtotime($date." 00:00:00");
            $todate = strtotime($date." 23:59:59");
        }

        $queue = DB::table('dfck_radt_queue AS q')
            ->join('dfck_person AS p','p.pid','=','q.pid')
            ->leftjoin('dfck_person_vitalsigns AS v', function($join){
                $join->on('v.pid','=','q.pid')
                    ->where('v.eid','=',0);
                })
            ->leftjoin('dfck_person_admissioninfo AS a', function($join){
                $join->on('a.pid','=','q.pid')
                    ->where('a.eid','=',0);
                })
            ->where('q.room_code',$room)
            ->where('q.hospital_code',$hospital)
            ->where('q.date','>=',$fromdate)
            ->whereNull('v.deleted_at')
            ->whereNull('a.deleted_at')
            ->where('q.date','<=',$todate)
            ->orderby('q.order','DESC')
            ->orderby('q.id')
            ->select('q.id AS queueid','p.*','a.by','a.refplace','a.refplacecode','a.reason','a.date','a.status',
                'v.height','v.weight','v.bloodpressure','v.temperature','v.heartbeat')
            ->get();
        return $queue;
    }
}