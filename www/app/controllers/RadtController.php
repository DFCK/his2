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
        );
        $find = RadtQueue::where('pid',$input['pid'])
            ->where('eid',null);
        if($find){
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
}