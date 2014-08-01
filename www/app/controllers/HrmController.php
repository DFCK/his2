<?php
class HrmController extends BaseController{
    public function getHrmtitle(){
        return View::make(Config::get('main.theme').'.hrm.hrmtitle');
    }

    public function postSavetitle()
    {
        $param = Input::get('data');
        if ($param['id'] == "") {
            $title = Employeetitle::create($param);
            echo $title->id;
        } else {
            $count = Employeetitle::find($param['id'])->update($param);
            echo $count;

        }
    }

    public function getLoadtitle(){
        return Employeetitle::all()->toJson();
    }

    public function deleteDeletetitle($id)
    {
        $count = Employeetitle::find($id)->delete();
        echo $count;
    }
}