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
    public function getEmployee($pid=''){
        $data['hospital_code'] = 74001;
        $data['hospital'] = Hospital::all()->tojson();
        $data['emptitle'] = Employeetitle::all()->tojson();
        if($pid!='' && strlen($pid) == 12)
            $data['person'] = Person::where('pid',$pid)->first()->tojson();
        else $data['person'] = '{}';
        return View::make(Config::get('main.theme').'.hrm.employee',$data);
    }
    public function getSearch($key){
        if(strlen($key)==12){
            //pid
            $person = Person::where('pid',$key)->first();
            if($person) return $person->tojson();
            else return '';
        }
    }
    public function getEmployeeinfo($pid){
        $emp = Employee::where('pid',$pid)->first();
        if($emp) return $emp->tojson();
        else return '';
    }
    public function postSave(){
        $input = Input::get('data');
        if($input['id']==''){
            unset($input['id']);
            $emp = Employee::create($input);
            echo $emp->id;
        }
        else{
            $rs = Employee::find($input['id'])->update($input);
            echo $rs;
        }
    }
}