<?php

class AdminController extends BaseController
{
    public function getModule()
    {
        return View::make(Config::get('main.theme') . '.admin.module');
    }

    public function getDmchucvu()
    {
        return View::make(Config::get('main.theme') . '.admin.dmchucvu');
    }

    public function getDepartment(){
        return View::make(Config::get('main.theme') . '.admin.department');
    }
    public function getHospital(){
        $data = array();
        $data['tuyenhanhchinh'] = DB::table('dfck_tuyen_hanhchinh')->select("*")->get();
        $data['tuyenbenhvien'] = DB::table('dfck_tuyen_benhvien')->select("*")->get();
        $data['tuyenyte'] = DB::table('dfck_tuyen_yte')->select("*")->get();
        $data['countries'] = DB::table('dfck_address_countries')->select("*")->get();
        $data['provinces'] = DB::table('dfck_address_province')->where('country_code','vn')->select("*")->get();
        $data['deptref'] = TypeDepartment::all()->tojson();
        return View::make(Config::get('main.theme') . '.admin.hospital',$data);
    }
    public function postSavehospital(){
        $input = Input::get('data');
        $find = Hospital::where('code', $input['code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $dept = Hospital::create($input);
                return $dept->id;
            } else {
                $effect = Hospital::find($input['id'])->update($input);
                echo $effect;
            }
        }
        else return -1;
    }
    public function getLoadhospital(){
        return Hospital::withTrashed()->get()->tojson();
    }
    public function deleteDelhospital($id){
        echo Hospital::find($id)->forceDelete();
    }
    public function getOpenhospital($id){
        echo Hospital::withTrashed()->where('id', $id)->restore();
    }
    public function deleteClosehospital($id){
        echo Hospital::find($id)->delete();
    }
    public function deleteDeldept($id){
        $effect = TypeDepartment::find($id)->delete();
        echo $effect;
    }
    public function postSavedeptfunc($type='i',$dept_code,$func_code){
        if($type=='d'){
            $effect = DeptFunc::where('department_code',$dept_code)
                ->where('function_code',$func_code)
                ->delete();
            echo $effect;
        }
        else if($type=='i'){
            $arr = array(
                'department_code' => $dept_code,
                'function_code' => $func_code,
            );
            $df = DeptFunc::create($arr);
            echo $df->id;
        }

    }
    public function getDeptfunclist($dept)
    {
        $deptfunc =  DB::table('dfck_function AS f')
            ->leftjoin('dfck_type_department_function AS d',function($join) use ($dept){
                $join->on('f.modulecode','=','d.function_code')
                        ->where('d.department_code','=',$dept);
                })
            ->select('f.*','d.id AS ischeck')
            ->orderBy('f.moduleparent')
            ->orderby('f.moduleorder')
            ->get();
        return Response::json($deptfunc);
    }

    public function getHospitaldeptselect($hospital_code){
        return Department::withTrashed()->where('hospital_code',$hospital_code)->get()->tojson();
    }
    public function getHospitaldeptward($hospital_code){
        $depts = Department::withTrashed()->where('hospital_code',$hospital_code)->get();
        $buildDept = array();
        foreach($depts as $dept){
            $sqlward = Ward::where('hospital_code',$dept->hospital_code)
                ->where('dept_code',$dept->code)
                ->get();
            $wards = array();
            foreach($sqlward as $ward){
                $wards[] = $ward->toarray();
            }
            $deptarr = $dept->toarray();
            $deptarr['wards'] = $wards;
            $buildDept[]  = $deptarr;
        }
//        echo'<pre>';var_dump($depts);
//        return $depts->tojson();
        return Response::json($buildDept);
    }
    public function postSavedept(){
        $input = Input::get('data');
        $find = TypeDepartment::where('code', $input['code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $dept = TypeDepartment::create($input);
                return $dept->id;
            } else {
                $effect = TypeDepartment::find($input['id'])->update($input);
                echo $effect;
            }
        }
        else return -1;
    }
    public function postSavehospitalward(){
        $input = Input::get('data');
        $find = Ward::where('code', $input['code'])
            ->where('hospital_code',$input['hospital_code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $ward = Ward::create($input);
                return $ward->id;
            } else {
                $effect = Ward::find($input['id'])->update($input);
                echo $effect;
            }
        }
        else return -1;
    }
    public function postSavehospitaldept(){
        $input = Input::get('data');
        $find = Department::where('code', $input['code'])
            ->where('hospital_code',$input['hospital_code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $dept = Department::create($input);
                return $dept->id;
            } else {
                $effect = Department::find($input['id'])->update($input);
                echo $effect;
            }
        }
        else return -1;
    }
    public function getLoaddept(){
        return TypeDepartment::all()->tojson();
    }
    public function postAdddmchucvu()
    {
        $input = Input::all();
        $chucvu = Dmchucvu::create($input['data']);
        echo $chucvu->id;
    }

    public function postAddmodule()
    {
        $params = Input::all();
        $arr = array(
            'modulename' => $params['data']['modulename'],
            'moduleurl' => $params['data']['moduleurl'],
            'modulelang' => $params['data']['modulelang'],
            'moduleparent' => $params['data']['moduleparent'],
            'modulecode' => $params['data']['modulecode'],
            'moduleorder' => $params['data']['moduleorder'],
            'moduleicon' => $params['data']['moduleicon'],
        );

        //dau tien la tim xem code co bi trung khong?
        $find = Adminfunction::where('modulecode', $arr['modulecode'])
            ->where('id', '!=', $params['data']['id'])
            ->count();
        if ($find <= 0) {
            $find = null;
            //neu co truyen ve id => update
            if ($params['data']['id'] && $params['data']['id'] > 0) {
                $find = Adminfunction::find($params['data']['id']);
            }
            //xu li update
            if ($find) {
                $find->modulename = $arr['modulename'];
                $find->moduleurl = $arr['moduleurl'];
                $find->modulelang = $arr['modulelang'];
                $find->moduleparent = $arr['moduleparent'];
                $find->modulecode = $arr['modulecode'];
//                $find->moduleorder = $arr['moduleorder'];
                $find->moduleicon = $arr['moduleicon'];
                echo $find->save();
            } else {
                //xu li insert moi
                $function = Adminfunction::create($arr);
                echo $function->id;

            }
        } else echo -1;
        //duplicate module code;

    }

    public function postDeletemodule()
    {
        $data = Input::all();
        echo Adminfunction::find($data['data']['id'])->delete();
    }

    public function getSelectlist()
    {
        return Adminfunction::where('moduleparent', '0')
            ->orderBy('moduleparent')
            ->orderBy('moduleorder')
            ->get()
            ->toJson();
    }

    public function getFunctionlist()
    {
        return Adminfunction::orderBy('moduleparent')
            ->orderBy('moduleorder')->get()->toJson();
    }

    public function postChangemoduleorder()
    {
        $data = Input::all();
        $count = 0;
        $result = 0;
        foreach ($data['data'] as $id => $val) {
            $result += Adminfunction::where('id', $val['id'])->update(array('moduleorder' => $id, 'moduleparent' => 0));
            $count++;
            if (isset($val['children']) && count($val['children']) > 0) {
                foreach ($val['children'] as $idc => $valc) {
                    $result += Adminfunction::where('id', $valc['id'])->update(array('moduleorder' => $idc, 'moduleparent' => $val['id']));
                    $count++;
                }
            }
        }
        if ($count == $result) echo 1;
        else echo 0;
    }
}