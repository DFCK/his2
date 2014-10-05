<?php

class RadtController extends BaseController
{

    public function getOutpatientroom($pid = '')
    {
        $data['function_code'] = 'paskb';
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
        if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['room_code']=='') )
            return '';
        $dept = $wardngoaitru['dept_code'];
//        $dept = 'kkb';
        $room = Room::getOutpatientRoom($hospital, $dept, '', $pid);
        if ($room)
            return Response::json($room);
    }

    public function getTiepnhan()
    {
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        $data['dept'] = 'kkb';
        $data['hrid'] = 1;
        return View::make(Config::get('main.theme') . '.radt.phongtiepnhan', $data);
    }

    public function getTiepnhanupdate()
    {
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        $data['function_code'] = 'pasadmit';
        $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
        if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['dept_code']=='') )
            return '';
        $dept = $wardngoaitru['dept_code'];
        $data['dept'] = $dept;
        $deptinfo = Department::getDeptInfo($hospital, $data['dept']);
        $room = Room::getOutpatientRoom($hospital, $data['dept']);
        $return = array();
        if ($deptinfo)
            $return['deptinfo'] = $deptinfo;
        else $return['deptinfo'] = null;
        if ($room)
            $return['roomlist'] = $room;
        else $room = null;
        return Response::json($return);
    }

    public function postSavequeue()
    {
        $room = Input::get('room');
        $fromdate = strtotime(date("d-m-Y 00:00:00"));
        $todate = strtotime(date("d-m-Y 23:59:59"));
        $input = array(
            'pid' => Input::get('pid'),
            'room_code' => $room['code'],
            'dept_code' => $room['dept_code'],
            'ward_code' => $room['ward_code'],
            'hospital_code' => $room['hospital_code'],
            'date' => time(),
            'eid' => Input::get('eid'),
        );
        $find = RadtQueue::where('date', '>=', $fromdate)
            ->where('date', '<=', $todate)
            ->where('pid', '=', $input['pid'])
            ->where(function ($where) use ($input) {
                $where->where('eid', 0)
                    ->orwhere('eid', $input['eid']);
            });
        if ($find->count()) {
            echo $find->update($input);
        } else {
            $queue = RadtQueue::create($input);
            echo $queue->id;
        }

    }

    public function getKhambenh()
    {
        $data['function_code'] = 'paskb';
        $hospital = Session::get('user.hospital_code'); //change it when have session.

        $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
            if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['room_code']=='') )
                return '';
        $data['dept'] = $wardngoaitru['dept_code'];
        $data['room'] = $wardngoaitru['room_code'];
        $data['hrid'] = Auth::user()->empid;
        return View::make(Config::get('main.theme') . '.radt.phongkhambenh', $data);
    }

    public function getRoomqueue($date = "", $roomid = '')
    {
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        if ($roomid == ''){
            $data['function_code'] = 'paskb';
                $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
            if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['room_code']=='') )
                return '';
            $room = $wardngoaitru['room_code'];
        }
        else
            $room = $roomid;

        if ($room == '-1') {
//            $data['function_code'] = 'pasadmit';
//            $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
//            if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['dept_code']=='') )
//            return '';
//            $dept = $wardngoaitru['dept_code'];
            $queue = Person::getPersonComeToday($hospital);
        } else
            $queue = RadtQueue::getCurrentRoom($hospital, $room, $date);
        return Response::json($queue);
    }

    public function getAdmission($id = '', $queue_id = '')
    {
        $hospital = Session::get('user.hospital_code'); //change it when have session.
        $data['function_code'] = 'paskb';
        $wardngoaitru = Employee::getNgoaitruWardRole($data['function_code']);
        if($wardngoaitru == null || ($wardngoaitru != null && $wardngoaitru['dept_code']=='') )
            return '';
        $dept = $wardngoaitru['dept_code'];
        $ward = $wardngoaitru['ward_code'];
        $room = $wardngoaitru['room_code'];
        if (strlen($id) == 12) {
            $pid = $id;
            $data['pid'] = $pid;
            $person = Person::getPersonInfo($pid);

            if (isset($person->pid)) {
                $enc = Encounter::where('pid', $pid)
                    ->where('discharged', 0)->first();
                if (isset($enc->eid))
                    return Redirect::to("/enc/info/" . $enc->eid);
                $data['person'] = $person;
                $data['vitalsign'] = VitalSign::where('pid', $pid)
                    ->where('eid', '0')
                    ->orderby('id', 'DESC')
                    ->first();
                $data['admissioninfo'] = PersonAdmissionInfo::where('pid', $pid)
                    ->where('eid', '0')
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
            } else return View::make(Config::get('main.theme') . '.pas.registration', array("message" => "Không tìm thấy mã " . $pid));
        } else
            return View::make(Config::get('main.theme') . '.pas.registration');
    }

    public function getIcd10($key)
    {
        $icd = Icd10::where('code', $key);
        if ($icd->count()) return $icd->select('code', 'name')->first()->tojson();
        else return null;
    }

    public function getSearchicd10($key)
    {
        $icd = Icd10::where('name', 'like', '%' . $key . '%');
        if ($icd->count()) return $icd->select('code', 'name')->orderBy('code')->take(50)->get()->tojson();
        else return null;
    }

    public function postSaveadmission()
    {
        $hospital_code = Session::get('user.hospital_code');
        $hospital_bhyt = Session::get('user.hospital_code');
        $input = Input::get('data');
        $input['subdiagnosiscodelist'] = implode(',', $input['subdiagnosiscodelist']);
        $input['subdiagnosislist'] = implode(',', $input['subdiagnosislist']);
        $input['hospital_code'] = $hospital_code;
        if ($input['eid'] == '') {
            //create
            $eid = Autoid::buildEID($hospital_bhyt);
            if ($eid > 0) {
                $input['eid'] = $eid;

                $input['datein'] = strtotime($input['datein']);
                $enc = Encounter::create($input);
                if ($enc->eid) {
                    //cap nhap location
                    $transfer = array();
                    $admitinfo = PersonAdmissionInfo::where('pid', $input['pid'])
                        ->where('eid', '0');
                    $admitinfors = $admitinfo->first();
                    if ($admitinfors) {

                        $transfer['type'] = $admitinfors->by;
                        if ($admitinfors->by == 2) {
                            $transfer['fromhospital'] = $admitinfors->refplacecode;
                        }

                    } else {
                        $transfer['type'] = 0; //mac dinh la tu den.
                    }
                    $transfer['eid'] = $enc->eid;
                    $transfer['pid'] = $enc->pid;
                    $transfer['tohospital'] = $hospital_code;
                    $transfer['todept'] = $input['dept_code'];
                    $transfer['toward'] = $input['ward_code'];
                    $transfer['date'] = $input['datein'];
                    EncounterTransfer::create($transfer);

                    //cap nhat eid cho sinh hieu, thong tin tiep nhan, hang doi kham
                    VitalSign::where('pid', $input['pid'])
                        ->where('eid', '0')
                        ->update(array('eid' => $enc->eid));

                    $admitinfo->update(array('eid' => $enc->eid));

                    RadtQueue::where('pid', $input['pid'])
                        ->where('eid', '0')
                        ->update(array('eid' => $enc->eid));
                    //tra ve ket qua
                    echo $enc->eid;
                }

            }
        } else {
            unset($input['datein']);
            $enc = Encounter::where('eid', $input['eid'])
                ->update($input);
            echo $enc;
        }
    }

    public function putDischarged($eid, $type = 7)
    {
        $hospital_code = Session::get('user.hospital_code');
        $effect = Encounter::where("eid", $eid)
            ->where("discharged", 0)
            ->update(array("discharged" => $type, "dateout" => time()));
        //
        if ($effect == 1) {
            $enc = Encounter::where('eid', $eid)->first();
            $lasttransfer = EncounterTransfer::where('eid', $eid)
                ->orderBy('id', 'DESC')
                ->take(1)
                ->first();

            $transfer['type'] = $type; // mac dinh xuat vien

            $transfer['eid'] = $enc->eid;
            $transfer['pid'] = $enc->pid;
            $transfer['fromhospital'] = $hospital_code;
            $transfer['fromdept'] = $lasttransfer->todept;
            $transfer['fromward'] = $lasttransfer->toward;
            $transfer['date'] = time();
            $trans = EncounterTransfer::create($transfer);
            echo $trans->id;
        }

    }
}