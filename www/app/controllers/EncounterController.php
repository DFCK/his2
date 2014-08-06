<?php
class EncounterController extends BaseController{
    public function getInfo($eid){
        $hospital = '74001'; //change it when have session.
        $dept = 'kkb';
        $ward = 'khukb';
        $room = 'kkbpk1';
        if (strlen($eid) == 15) {
            $data['eid'] = $eid;
            $enc = Encounter::where('eid',$eid)->first();
            if($enc->pid){
                $pid = $enc->pid;
                $person = Person::getPersonInfo($pid);
                $data['enc'] = $enc->tojson();
                if ($person->pid) {
                    $data['person'] = $person;
                    $data['vitalsign'] = VitalSign::where('pid', $pid)
                        ->where('eid', $eid)
                        ->orderby('id', 'DESC')
                        ->first();
                    $data['admissioninfo'] = PersonAdmissionInfo::where('pid', $pid)
                        ->where('eid', $eid)
                        ->orderby('id', 'DESC')
                        ->first();
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
            }

        }
        else
            return View::make(Config::get('main.theme') . '.pas.registration');
    }
}