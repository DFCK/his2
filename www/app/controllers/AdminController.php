<?php

class AdminController extends BaseController
{

    /**
     * Quản lý danh mục chức năng
     */
    public function getModule()
    {
        return View::make(Config::get('main.theme') . '.admin.module');
    }

    public function postAddmodule()
    {
        $params = Input::all();
        $arr = array(
            'name' => $params['data']['name'],
            'url' => $params['data']['url'],
            'lang' => $params['data']['lang'],
            'parent' => $params['data']['parent'],
            'code' => $params['data']['code'],
            'order' => $params['data']['order'],
            'icon' => $params['data']['icon'],
        );

        //dau tien la tim xem code co bi trung khong?
        $find = Adminfunction::where('code', $arr['code'])
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
                $find->name = $arr['name'];
                $find->url = $arr['url'];
                $find->lang = $arr['lang'];
                $find->parent = $arr['parent'];
                $find->code = $arr['code'];
//                $find->moduleorder = $arr['moduleorder'];
                $find->icon = $arr['icon'];
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
        return Adminfunction::where('parent', '0')
            ->orderBy('parent')
            ->orderBy('order')
            ->get()
            ->toJson();
    }

    public function getFunctionlist()
    {
        return Adminfunction::orderBy('parent')
            ->orderBy('order')->get()->toJson();
    }

    public function postChangemoduleorder()
    {
        $data = Input::all();
        $count = 0;
        $result = 0;
        foreach ($data['data'] as $id => $val) {
            $result += Adminfunction::where('id', $val['id'])->update(array('order' => $id, 'parent' => 0));
            $count++;
            if (isset($val['children']) && count($val['children']) > 0) {
                foreach ($val['children'] as $idc => $valc) {
                    $result += Adminfunction::where('id', $valc['id'])->update(array('order' => $idc, 'parent' => $val['id']));
                    $count++;
                }
            }
        }
        if ($count == $result) echo 1;
        else echo 0;
    }

    /**
     * Quản lý danh mục khoa phòng
     */
    public function getDepartment()
    {
        return View::make(Config::get('main.theme') . '.admin.department');
    }

    public function deleteDeldept($id)
    {
        $effect = TypeDepartment::find($id)->delete();
        echo $effect;
    }

    public function postSavedeptfunc($type = 'i', $dept_code, $func_code)
    {
        if ($type == 'd') {
            $effect = DeptFunc::where('department_code', $dept_code)
                ->where('function_code', $func_code)
                ->delete();
            echo $effect;
        } else if ($type == 'i') {
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
        $deptfunc = DB::table('dfck_function AS f')
            ->leftjoin('dfck_type_department_function AS d', function ($join) use ($dept) {
                $join->on('f.code', '=', 'd.function_code')
                    ->where('d.department_code', '=', $dept);
            })
            ->select('f.*', 'd.id AS ischeck')
            ->orderBy('f.parent')
            ->orderby('f.order')
            ->get();
        return Response::json($deptfunc);
    }

    public function postSavedept()
    {
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
        } else return -1;
    }

    public function getLoaddept()
    {
        return TypeDepartment::all()->tojson();
    }


    /**
     * Quản lý thiết lập bệnh viện
     */
    public function getHospital()
    {
        $data = array();
        $data['tuyenhanhchinh'] = DB::table('dfck_tuyen_hanhchinh')->select("*")->get();
        $data['tuyenbenhvien'] = DB::table('dfck_tuyen_benhvien')->select("*")->get();
        $data['tuyenyte'] = DB::table('dfck_tuyen_yte')->select("*")->get();
        $data['countries'] = DB::table('dfck_address_countries')->select("*")->get();
        $data['provinces'] = DB::table('dfck_address_province')->where('country_code', 'vn')->select("*")->get();
        $data['deptref'] = TypeDepartment::all()->tojson();
        return View::make(Config::get('main.theme') . '.admin.hospital', $data);
    }

    public function postSavehospital()
    {
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
        } else return -1;
    }

    public function getLoadhospital()
    {
        return Hospital::withTrashed()->get()->tojson();
    }

    public function deleteDelhospital($id)
    {
        echo Hospital::find($id)->forceDelete();
    }

    public function getOpenhospital($id)
    {
        echo Hospital::withTrashed()->where('id', $id)->restore();
    }

    public function deleteClosehospital($id)
    {
        echo Hospital::find($id)->delete();
    }

    public function deleteClosedept($id)
    {
        echo Department::find($id)->delete();
    }
    public function deleteDelroom($id)
    {
        echo Room::withTrashed()->where('id',$id)->forceDelete();
    }
    public function deleteCloseroom($id)
    {
        echo Room::withTrashed()->where('id',$id)->delete();
    }

    public function putOpendept($id)
    {
        echo Department::withTrashed()->where('id', $id)->restore();
    }
    public function putOpenroom($id)
    {
        echo Room::withTrashed()->where('id', $id)->restore();
    }

    public function putOpenward($id)
    {
        echo Ward::withTrashed()->where('id', $id)->restore();
    }

    public function deleteCloseward($id)
    {
        echo Ward::find($id)->delete();
    }

    public function deleteDelward($id)
    {
        echo Ward::withTrashed()->where('id', $id)->forceDelete();
    }

    public function deleteDelhospitaldept($id)
    {
        echo Department::withTrashed()->where('id', $id)->forceDelete();
    }

    public function getHospitaldeptselect($hospital_code)
    {
        return Department::withTrashed()->where('hospital_code', $hospital_code)->get()->tojson();
    }

    public function getHospitaldeptward($hospital_code)
    {
        $depts = Department::withTrashed()->where('hospital_code', $hospital_code)->get();
        $buildDept = array();
        foreach ($depts as $dept) {
            $sqlward = Ward::withTrashed()->where('hospital_code', $dept->hospital_code)
                ->where('dept_code', $dept->code)
                ->get();
            $wards = array();
            foreach ($sqlward as $ward) {
                $wards[] = $ward->toarray();
            }
            $deptarr = $dept->toarray();
            $deptarr['wards'] = $wards;
            $buildDept[] = $deptarr;
        }
        return Response::json($buildDept);
    }
    public function getLoadhospitalroom($hos,$dept,$ward){
        return Room::withTrashed()->where('hospital_code',$hos)
            ->where('dept_code',$dept)
            ->where('ward_code',$ward)
            ->get()->tojson();
    }
    public function postSavehospitalroom(){
        $input = Input::get('data');
        $find = Room::where('code', $input['code'])
            ->where('hospital_code', $input['hospital_code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $ward = Room::create($input);
                return $ward->id;
            } else {
                $effect = Room::find($input['id'])->update($input);
                echo $effect;
            }
        } else return -1;
    }
    public function postSavehospitalward()
    {
        $input = Input::get('data');
        $find = Ward::where('code', $input['code'])
            ->where('hospital_code', $input['hospital_code'])
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
        } else return -1;
    }

    public function postSavehospitaldept()
    {
        $input = Input::get('data');
        $find = Department::where('code', $input['code'])
            ->where('hospital_code', $input['hospital_code'])
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
        } else return -1;
    }

    /**
     * Quản lý danh mục chức vụ
     */

    public function getDmchucvu()
    {
        return View::make(Config::get('main.theme') . '.admin.dmchucvu');
    }


    public function postSavechucvu()
    {
        $input = Input::get('data');
        $find = EmployeePosition::where('code', $input['code'])
            ->where('id', '!=', $input['id'])
            ->count();
        if ($find <= 0) {
            if ($input['id'] == '' || $input['id'] <= 0) {
                $rs = EmployeePosition::create($input);
                return $rs->id;
            } else {
                $effect = EmployeePosition::find($input['id'])->update($input);
                echo $effect;
            }
        } else return -1;
    }
    public function getLoadchucvu(){
        return EmployeePosition::all()->tojson();
    }
    public function getPositionfunclist($chucvucode){
        $roleposition = DB::table('dfck_function AS f')
            ->leftjoin('dfck_employee_position_role AS r', function ($join) use ($chucvucode) {
                $join->on('f.code', '=', 'r.function_code')
                    ->where('r.position_code', '=', $chucvucode);
            })
            ->select('f.*', 'r.role')
            ->orderBy('f.parent')
            ->orderby('f.order')
            ->get();
        return Response::json($roleposition);
    }
    public function deleteDelchucvu($id){
        echo EmployeePosition::find($id)->delete();
    }
    public function putChangepositionrole($funccode,$poscode,$role){
        $find = EmployeePositionRole::where('function_code',$funccode)
            ->where('position_code',$poscode)
            ->get()->count();
        if($find > 0){
            echo EmployeePositionRole::where('function_code',$funccode)
                ->where('position_code',$poscode)->update(array('role'=>$role));
        }
        else{
            $rs = EmployeePositionRole::create(array(
                'function_code'=>$funccode,
                'position_code'=>$poscode,
                'role'=>$role
            ));
            echo $rs->id;
        }
    }


}