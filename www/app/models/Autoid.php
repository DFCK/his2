<?php
class Autoid extends Eloquent{
    protected $table = 'dfck_autoid';
    public static function buildPID($province){

        //reset if change year
        $autoid = Autoid::where('name','pid'.$province)->first();
        if($autoid->year < date("Y") )
            Autoid::where('name','pid'.$province)
                ->update(array('year'=>date("Y"),'current'=>0,'reseted_at'=>DB::raw("NOW()")));
    }
}