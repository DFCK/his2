<?php
class Employee extends Eloquent{
    protected $table = 'dfck_employee';
    protected $fillable = array('hospital_code','title','created_by','pid');
    protected $softDelete = true;
    public function person()
    {
        return $this->belongsTo('Person', 'pid', 'pid');
    }
    public function emptitle(){
        return $this->hasOne('Employeetitle','code','title');
    }
    public static  function getEmployeeFullInfo($pid){
        $e = DB::table('dfck_employee AS emp')
            ->join('dfck_hospital AS h','emp.hospital_code','=','h.code')
            ->join('dfck_employee_title AS t','emp.title','=','t.code')
            ->where('emp.pid',$pid)
            ->whereNull('emp.deleted_at')
            ->select('emp.*','h.name AS hospital_name','h.code AS hospital_code',
                't.name AS title_name','t.code AS title_code','t.group AS title_group')
            ->first();
        return $e;
    }
    public static function getEmployeeRole($pid){
        $role = DB::table('dfck_employee_transfer AS tr')
            ->join('dfck_type_department_function AS f','f.department_code','=','tr.dept_code')
            ->leftjoin('dfck_hospital_ward AS w','w.code','=','tr.ward_code')
            ->join('dfck_employee_position_role AS r',function($join){
                $join->on('r.position_code','=','tr.position_code');
                $join->on('f.function_code','=','r.function_code');
            })
            ->where('tr.pid',$pid)
            ->select('tr.*','f.function_code','r.role AS role','w.type AS ward_type')
            ->get();
        return $role;
    }
    public static function canViewFunction($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            foreach($func as $item){
                if($item['role'] > 0) return true;
            }
        }
        if(Session::get('user.title_group')=='admin') return true;
        return false;
    }
    public static function canWriteFunction($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            foreach($func as $item){
                if($item['role'] > 1) return true;
            }
        }
        if(Session::get('user.title_group')=='admin') return true;
        return false;
    }
    public static function canEditFunction($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            foreach($func as $item){
                if($item['role'] > 2) return true;
            }
        }
        if(Session::get('user.title_group')=='admin') return true;
        return false;
    }
    public static function canDeleteFunction($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            foreach($func as $item){
                if($item['role'] > 3) return true;
            }
        }
        if(Session::get('user.title_group')=='admin') return true;
        return false;
    }
    public static function getNgoaitruWardRole($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            foreach($func as $item){
                if($item['ward_type'] == 'ngt') return $item;
            }
        }
        return null;
    }
    public static function getNewsDept($function_code){
        if(Session::has('role.'.$function_code)){
            $func = Session::get('role.'.$function_code);
            $dept = array();
            foreach($func as $item){
                if($item['role'] == 4) return 99;//duoc quyen post tin toan benh vien
                else if($item['role']>1 && $item['role']<4){
                    $dept[] = $item['dept_code'];//cac khoa duoc post tin
                }
            }
            return $dept;
        }
        return null;
    }
}