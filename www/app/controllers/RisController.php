<?php
class RisController extends BaseController{
    public function getLoadcdhaposition($type){
        return TypeCDHA::where('type',$type)
            ->where('name','!=','default')
            ->get()->tojson();
    }
    public function postSavechidinhcdha(){
        $hospital = 74001;
        $input = Input::get('data');
        $input['hospital_code'] = $hospital;
        $input['position'] = implode("$",$input['position']);
        $input['date'] = strtotime($input['date']);
        $chidinh = RISRequest::create($input);
        echo $chidinh->id;
    }
}