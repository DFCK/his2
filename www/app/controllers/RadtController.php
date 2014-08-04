<?php
class RadtController extends BaseController{

    public function getOutpatientroom($pid=''){
        $hospital = 'BVBD';//change it when have session.
        $dept = 'kkb';
        $room = Room::getOutpatientRoom($hospital,$dept,'',$pid);
        if($room)
            return Response::json($room);
    }
    public function postSavequeue(){
        $room = Input::get('room');

        $input = array(
            'pid' => Input::get('pid'),
            'room_code' => $room['code'],
            'dept_code' => $room['dept_code'],
            'ward_code' => $room['ward_code'],
            'hospital_code' => $room['hospital_code'],
            'date' => time(),
        );
        $find = RadtQueue::where('pid','=',$input['pid'])
            ->where('eid','0');
        if($find->count()){
            echo $find->update($input);
        }
        else{
            $queue = RadtQueue::create($input);
            echo $queue->id;
        }

    }
    public function getKhambenh(){
        $hospital = 'BVBD';//change it when have session.
        $data['dept'] = 'kkb';
        $data['room'] = 'kkbpk1';
        $data['hrid'] = 1;
        return View::make(Config::get('main.theme') . '.radt.phongkhambenh',$data);
    }
    public function getRoomqueue($date=""){
        $hospital = 'BVBD';//change it when have session.
        $room = 'kkbpk1';
        $queue = RadtQueue::getCurrentRoom($hospital,$room,$date);
        return Response::json($queue);
    }
    public function getAdmission($pid='',$queue_id=''){
        if (strlen($pid) > 0) {
            $data['pid'] = $pid;
            $person = Person::getPersonInfo($pid);

            if ($person->pid) {
                $data['person'] = $person;
                $data['vitalsign'] = VitalSign::where('pid',$pid)
                    ->where('eid','0')
                    ->orderby('id','DESC')
                    ->first();
                $data['admissioninfo'] = PersonAdmissionInfo::where('pid',$pid)
                    ->where('eid','0')
                    ->orderby('id','DESC')
                    ->first();
                return View::make(Config::get('main.theme') . '.radt.admission', $data);
            }

            else return View::make(Config::get('main.theme') . '.pas.registration', array("message" => "Không tìm thấy mã " . $pid));
        }
        else
            return View::make(Config::get('main.theme') . '.pas.registration');
    }
}