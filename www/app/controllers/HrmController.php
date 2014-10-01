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
    public function getTransfer($pid=''){
        $data['hospital_code'] = 74001;
        $data['hospital'] = Hospital::all()->tojson();
        $data['dept'] = Department::where('hospital_code',$data['hospital_code'])->get()->tojson();
        $data['ward'] = Ward::where('hospital_code',$data['hospital_code'])->get()->tojson();
        $data['room'] = Room::where('hospital_code',$data['hospital_code'])->get()->tojson();
        $data['position'] = EmployeePosition::all()->tojson();
        $data['person'] = '{}';
        $data['employee'] = '{}';
        $data['employeetitle'] = '{}';
        if($pid!='' && strlen($pid) == 12){
            $person = Person::where('pid',$pid)->first();
            if($person){
                $data['person'] = $person->tojson();
                $emp = Person::withTrashed()->find($person->id)->employee;
                if($emp){
                    $data['employee'] = $emp->tojson();
                    $data['employeetitle'] = Employee::withTrashed()->find($emp->id)->emptitle->tojson();
                }

            }
        }
        return View::make(Config::get('main.theme').'.hrm.transfer',$data);
    }
    public function getEmployee($pid=''){
        $data['hospital_code'] = 74001;
        $data['hospital'] = Hospital::all()->tojson();
        $data['emptitle'] = Employeetitle::all()->tojson();
        $data['person'] = '{}';
        if($pid!='' && strlen($pid) == 12){
            $person = Person::where('pid',$pid)->first();
            if($person)
                $data['person'] = $person->tojson();
        }
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
        $emp = Employee::withTrashed()->where('pid',$pid)->first();
        if($emp) return $emp->tojson();
        else return '';
    }
    public function putChangestatusemp($pid,$type){
        if($type==0){
            echo Employee::where('pid',$pid)->delete();
        }
        else{
            echo Employee::withTrashed()->where('pid',$pid)->restore();
        }
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