<?php

class Autoid extends Eloquent
{
    protected $table = 'dfck_autoid';

    public static function buildPID($province)
    {

        //reset if change year
        $autoid = Autoid::where('name', 'pid' . $province)->first();
        if ($autoid->year < date("Y"))
            Autoid::where('name', 'pid' . $province)
                ->update(array('year' => date("Y"), 'current' => 0, 'reseted_at' => DB::raw("NOW()")));
        $pid = 0;
        DB::select("CALL buildpid(?,@number)", array($province));
        $result = DB::select('SELECT @number AS pid');
        if ($result) {
            $pid = $result[0]->pid;
            $stt = "";
            for ($i = ($autoid->length - 3 - 2 - strlen($pid)); $i > 0; $i--) {
                $stt .= "0";
            }
            return $province . date("y") . $stt . $pid;
        } else 0;
    }

    public static function buildEID($hospital_bhyt)
    {
        $autoid = Autoid::where('name', 'eid' . $hospital_bhyt)->first();
        //'200011408019999';//15 so
        $today = strtotime(date("Y-n-j"));
        $dbday = strtotime($autoid->year . '-' . $autoid->month . '-' . $autoid->day);
        if ($dbday < $today) {
            Autoid::where('name', 'eid' . $hospital_bhyt)
                ->update(array('year' => date('Y'), 'month' => date('n'), 'day' => date('j'), 'current' => 0, 'reseted_at' => DB::raw("NOW()")));
        }
        $eid = 0;
        DB::select("CALL buildeid(?,@number)", array($hospital_bhyt));
        $result = DB::select('SELECT @number AS eid');
        if ($result) {
            $eid = $result[0]->eid;
            $stt = "";
            for ($i = ($autoid->length - 5 - 6 - strlen($eid)); $i > 0; $i--) {
                $stt .= "0";
            }
            return $hospital_bhyt . date("y") . date('m') . date('d') . $stt . $eid;
        } else 0;

    }
}