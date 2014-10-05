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
        $data['hospital'] = Hospital::all()->tojson();
        if(Session::get('user.hospital_code') != ''){
            $data['hospital_code'] = Session::get('user.hospital_code');
            $data['dept'] = Department::where('hospital_code',$data['hospital_code'])->get()->tojson();
            $data['ward'] = Ward::where('hospital_code',$data['hospital_code'])->get()->tojson();
            $data['room'] = Room::where('hospital_code',$data['hospital_code'])->get()->tojson();
        }
        else{
            $data['hospital_code'] = 0;
            $data['dept'] = Department::all()->tojson();
            $data['ward'] = Ward::all()->tojson();
            $data['room'] = Room::all()->tojson();
        }

        $data['position'] = EmployeePosition::all()->tojson();
        $data['person'] = '{}';
        $data['employee'] = '{}';
        $data['employeetitle'] = Employeetitle::all()->tojson();

        if($pid!='' && strlen($pid) == 12){
            $person = Person::where('pid',$pid)->first();
            if($person){
                $data['person'] = $person->tojson();
                $emp = Person::withTrashed()->find($person->id)->employee;
                if($emp){
                    $data['employee'] = $emp->tojson();
                }

            }
        }
        return View::make(Config::get('main.theme').'.hrm.transfer',$data);
    }
    public function getEmployeelisttransfer($pid){
        $list = DB::table('dfck_employee_transfer AS t')
            ->leftjoin('dfck_employee_position AS p','p.code','=','t.position_code')
            ->leftjoin('dfck_hospital_department AS d','d.code','=','t.dept_code')
            ->leftjoin('dfck_hospital_ward AS w','w.code','=','t.ward_code')
            ->leftjoin('dfck_hospital_room AS r','r.code','=','t.room_code')
            ->where('t.pid',$pid)
            ->select('t.*','p.name AS positionname','p.code AS position_code','d.name AS deptname','w.name AS wardname','r.name AS roomname')
            ->get();
        if($list){
            return Response::json($list);
        }
        else return "";

    }
    public function getListemployee($hospital_code,$dept_code = '0'){
        if($dept_code !='0')
        $list = DB::table('dfck_employee AS e')
            ->join('dfck_person AS p','e.pid','=','p.pid')
            ->join('dfck_employee_title AS t','e.title','=','t.code')
            ->join('dfck_employee_transfer AS tr','tr.pid','=','e.pid')
            ->leftjoin('dfck_employee_position AS po','tr.position_code','=','po.code')
            ->where('e.hospital_code','=',''.$hospital_code)
            ->where('tr.hospital_code','=',$hospital_code)
            ->where('tr.dept_code','=',$dept_code)
            ->select('e.*','p.lastname','p.firstname','p.dob','p.yob','t.name AS titlename','po.name AS positionname',
            'tr.*');
        else
            $list = DB::table('dfck_employee AS e')
                ->join('dfck_person AS p','e.pid','=','p.pid')
                ->join('dfck_employee_title AS t','e.title','=','t.code')
                ->where('e.hospital_code','=',''.$hospital_code)
            ->select('e.*','p.lastname','p.firstname','p.dob','p.yob','t.name AS titlename');
        $list = $list->get();
        return Response::json($list);
    }
    public function getRole($pid=''){
        $data['hospital_code'] = Session::get('user.hospital_code');
        $data['person'] = '{}';
        if($pid!='' && strlen($pid) == 12){
            $person = Person::where('pid',$pid)->first();
            if($person)
                $data['person'] = $person->tojson();
        }
        return View::make(Config::get('main.theme').'.hrm.role',$data);
    }
    public function getLoadaccount($pid){
        $user =  User::where('pid',$pid)->first();
        if($user) return Response::json($user);
        else return '';
    }
    public function postSaveaccount(){
        $input = Input::get('data');
        $input['password'] = Hash::make($input['password']);
        if($input['id']==''){
            $user = User::create($input);
            return Response::json($user);
        }
        else{
            $user = User::find($input['id']);
            if($user){
                echo User::find($input['id'])->update($input);
            }
        }
    }
    public function getEmployee($pid=''){
        $data['hospital_code'] = Session::get('user.hospital_code');
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
        else{
            $person = DB::table('dfck_employee AS e')
                ->join('dfck_person AS p','p.pid','=','e.pid')
                ->where('e.id','=',$key)
                ->select('p.*')->first();
            if($person) return Response::json($person);
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
    public function postSavetransfer(){
        $input = Input::get('data');
        if(isset($input['pid']) && $input['hospital_code'] != '0' && $input['dept_code'] != '0'){
            $trans = EmployeeTransfer::where('pid',$input['pid'])
                ->where('hospital_code',$input['hospital_code'])
                ->where('dept_code',$input['dept_code']);
            if($trans->count()>0){
                echo $trans->update($input);
            }
            else{
                $trans = EmployeeTransfer::create($input);
                echo $trans->id;
            }
        }
    }
}