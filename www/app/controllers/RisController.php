<?php
class RisController extends BaseController{
    public function getLoadcdhaposition($type){
        return TypeCDHA::where('type',$type)
            ->where('name','!=','default')
            ->get()->tojson();
    }
    public function postSavechidinhcdha(){
        $hospital = 74001;
        $input = Input::get('data');
        $input['hospital_code'] = $hospital;
        $input['date'] = strtotime($input['date']);
        $positions = $input['position'];
        $chidinh = 0;
        foreach($positions as $pos){
            $input['position'] = $pos;
            $rs = RISRequest::create($input);
            $chidinh+= $rs->id;
        }
        if($chidinh > 0)
            echo RISRequest::where('eid',$input['eid'])->count();
        else echo 0;
    }
    public function getLoadrequestris($eid){
        $rs = DB::table('dfck_ris_request AS r')
            ->join('dfck_type_cdha AS t','t.code','=','r.position')
            ->where('r.eid',$eid)
            ->select('r.*','t.name AS positionname')
            ->get();
        return Response::json($rs);

    }
    public function getResult($type,$id){
        if($type=='sieuam'){
            return SieuamResult::where('request_id',$id)->first()->tojson();
        }
    }
    public function deleteDelchidinhcdha($id){
        echo RISRequest::find($id)->delete();
    }
    public function getSieuam(){
        $data['hospital'] = 74001;
        $data['type'] = 'sieuam';
        return View::make(Config::get('main.theme') . '.ris.sieuam', $data);

    }

    public function getLoadristemplate($type,$code){
        $template = TypeCDHA::where('code',$code)->first();
        if($template->template != "") echo $type->template;
        else{
            $template = TypeCDHA::where('code','=',$type.'0')->first();
            echo $template->template;
        }
    }
    public function getLoadsieuamresult($id){
        return SieuamResult::where('request_id',$id)->first()->tojson();
    }
    public function postSavesieuam(){
        $hospital_code = 74001;
        $input = Input::get('data');
        $input['hospital_code'] = $hospital_code;
        $input['date'] = time();
        if(!isset($input['id']) || $input['id'] == 0)  {
            $rs = SieuamResult::create($input);
            RISRequest::find($input['request_id'])->update(array('status'=>1));
            return Response::json($rs);
        }
        else{
            echo SieuamResult::find($input['id'])->update($input);
        }

    }

    public function getLoadrisrequest($type,$date,$status=0){
        $datefrom = strtotime($date);
        $dateto = strtotime($date." 23:59:59");
        $request =  DB::table('dfck_ris_request AS r')
            ->join('dfck_person AS p','p.pid','=','r.pid')
            ->join('dfck_type_cdha AS t','t.code','=','r.position')
            ->where('r.type',$type)
            ->where('r.status',$status)
            ->where('r.date','>=',$datefrom)
            ->where('r.date','<=',$dateto)
            ->select('r.*','p.lastname','p.firstname','p.yob','t.name AS positionname')
            ->orderby('r.date')
            ->get();
        return Response::json($request);
    }
    public function getLoadxquangrequest($date,$status=0){
        $datefrom = strtotime($date);
        $dateto = strtotime($date." 23:59:59");
        $request =  DB::table('dfck_ris_request AS r')
            ->join('dfck_person AS p','p.pid','=','r.pid')
            ->where('r.type','xquang')
            ->where('r.status',$status)
            ->where('r.date','>=',$datefrom)
            ->where('r.date','<=',$dateto)
            ->select('r.*','p.lastname','p.firstname','p.yob')
            ->orderby('r.date')
            ->get();
        return Response::json($request);
    }
    public function getXquang(){
        $data['hospital'] = 74001;
        $data['type'] = 'xquang';
        return View::make(Config::get('main.theme') . '.ris.xquang', $data);

    }
    public function getPacspatientbypid($pid){
        $param = array(
            'a' => 'pat_list',
            'pid' => $pid,
        );
        return $this->getPacsapi($param);
    }
    public function getPacspatienbydate($date){
        $param = array(
            'a' => 'pat_list',
            'pid' => 0,
            'dfrom' => $date,
            'dto' => $date,
        );
        return $this->getPacsapi($param);
    }
    public function getPacspatientstudy($date,$pk){
        $param = array(
            'a' => 'study_list',
            'pat_id' => $pk,
            'date' => "",
        );
        return $this->getPacsapi($param);
    }
    public function getPacspatientseries($pk){
        $param = array(
            'a' => 'series_list',
            'study_id' => $pk,
        );
        return $this->getPacsapi($param);
    }
    public function getPacspatientinstance($series){
        $param = array(
            'a' => 'pat_file',
            'series_id' => $series,
        );
        return $this->getPacsapi($param);
    }
    public function getPacsapi($param){
        $ip = "http://192.168.1.25/pacsapi/?c=api";//sau nay se lay tu csdl tung benh vien
        $url = "";
        if($param['a']=='pat_list'){
            $url .='&a='.$param['a'].'&pid='.$param['pid'].'&dfrom='.$param['dfrom'].'&dto='.$param['dto'];
        }
        else if($param['a']=='study_list'){
            $url .='&a='.$param['a'].'&pat_id='.$param['pat_id'];
        }
        else if($param['a']=='series_list'){
            $url .='&a='.$param['a'].'&study_id='.$param['study_id'];
        }
        else if($param['a']=='pat_file'){
            $url .='&a='.$param['a'].'&series_id='.$param['series_id'];
        }
        echo file_get_contents($ip.$url);
    }
}