<?php
class EncounterController extends BaseController{
    public function getInfo($eid){
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        $data['function_code'] = 'paskb';
        $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
        if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['room_code']=='') )
            return '';
        $dept = $wardngoaitru['dept_code'];
        $ward = $wardngoaitru['ward_code'];
        $room = $wardngoaitru['room_code'];
//        $dept = 'kkb';
//        $ward = 'khukb';
//        $room = 'kkbpk1';
        if (strlen($eid) == 15) {
            $data['eid'] = $eid;
            $enc = vEncounter::where('eid',$eid)->first();
            if(isset($enc->pid)){
                $pid = $enc->pid;
                $person = Person::getPersonInfo($pid);
                $data['encjson'] = $enc->tojson();
                $data['enc'] = $enc;
                if (isset($person->pid)) {
                    $data['person'] = $person;
                    $data['depts'] = DB::table('dfck_hospital_department AS d')
                        ->join('dfck_type_department AS t', 't.code', '=', 'd.ref_code')
                        ->where('d.hospital_code', $hospital)
                        ->where('t.type', 0)
                        ->select('d.name', 'd.code')
                        ->get();
                    $data['wards'] = Ward::where('hospital_code', $hospital)
                        ->where('dept_code', $dept)
                        ->select('name', 'code')
                        ->get();
                    $data['deptcode'] = $dept;
                    $data['wardcode'] = $ward;

                    return View::make(Config::get('main.theme') . '.radt.admission', $data);
                }
                else
                    return View::make(Config::get('main.theme') . '.pas.registration');
            }
            else
                return View::make(Config::get('main.theme') . '.pas.registration');

        }
        else
            return View::make(Config::get('main.theme') . '.pas.registration');
    }
}