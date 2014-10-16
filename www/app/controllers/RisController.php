<?php
class RisController extends BaseController{
    public function getLoadcdhaposition($type){
        return TypeCDHA::where('type',$type)
            ->where('name','!=','default')
            ->get()->tojson();
    }
    public function postSavecdha()
    {
        $param = Input::get('data');
        if ($param['id'] == "") {
            $title = TypeCDHA::create($param);
            echo $title->id;
        } else {
            $count = TypeCDHA::find($param['id'])->update($param);
            echo $count;
        }
    }
    public function deleteDeletecdha($id)
    {
        $count = TypeCDHA::find($id)->delete();
        echo $count;
    }
    public function postSavechidinhcdha(){
        $hospital = Session::get('user.hospital_code');
        $input = Input::get('data');
        $input['hospital_code'] = $hospital;
        $input['date'] = strtotime($input['date']);
        $positions = $input['position'];
        $chidinh = 0;
        foreach($positions as $pos){
            $input['position'] = $pos;
            $input['created_by'] = Session::get('user.pid');
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
            ->leftjoin('dfck_employee AS e','e.pid','=','r.pid')
            ->leftjoin('dfck_person AS p','p.pid','=','r.pid')
            ->leftjoin('dfck_employee_title AS et','et.code','=','e.title')
            ->where('r.eid',$eid)
            ->select('r.*','t.name AS positionname','p.lastname','p.firstname','et.name AS title_name')
            ->get();
        return Response::json($rs);

    }
    public function getResult($type,$id){
            return RisResult::where('request_id',$id)->first()->tojson();
    }
    public function deleteDelchidinhcdha($id){
        echo RISRequest::find($id)->delete();
    }
    public function getSieuam(){
        $data['hospital'] = Session::get('user.hospital_code');
        $data['type'] = 'sieuam';
        return View::make(Config::get('main.theme') . '.ris.sieuam', $data);
    }
    public function getNoisoi(){
        $data['hospital'] = Session::get('user.hospital_code');
        $data['type'] = 'noisoi';
        return View::make(Config::get('main.theme') . '.ris.noisoi', $data);
    }
    public function getXquang(){
        $data['hospital'] = Session::get('user.hospital_code');
        $data['type'] = 'xquang';
        return View::make(Config::get('main.theme') . '.ris.xquang', $data);
    }
    public function getCt(){
        $data['hospital'] = Session::get('user.hospital_code');
        $data['type'] = 'ct';
        return View::make(Config::get('main.theme') . '.ris.ct', $data);
    }
    public function getMri(){
        $data['hospital'] = Session::get('user.hospital_code');
        $data['type'] = 'mri';
        return View::make(Config::get('main.theme') . '.ris.mri', $data);
    }

    public function getLoadristemplate($type,$code){
        $template = TypeCDHA::where('code',$code)->first();
        if($template->template != "") echo $type->template;
        else{
            $template = TypeCDHA::where('code','=',$type.'0')->first();
            echo $template->template;
        }
    }
    public function getLoadrisresult($id){
        return RisResult::where('request_id',$id)->first()->tojson();
    }
    public function postSaveris(){
        $hospital_code = Session::get('user.hospital_code');
        $input = Input::get('data');
        $input['hospital_code'] = $hospital_code;
        $input['date'] = time();
        if(!isset($input['id']) || $input['id'] == 0)  {
            $input['created_by'] = Session::get('user.pid');
            $rs = RisResult::create($input);
            RISRequest::find($input['request_id'])->update(array('status'=>1));
            return Response::json($rs);
        }
        else{
            echo RisResult::find($input['id'])->update($input);
        }
    }

    public function getLoadrisrequest($type,$date,$status=0){
        $datefrom = strtotime($date);
        $dateto = strtotime($date." 23:59:59");
        $request =  DB::table('dfck_ris_request AS r')
            ->join('dfck_person AS p','p.pid','=','r.pid')
            ->join('dfck_type_cdha AS t','t.code','=','r.position')
            ->join('dfck_encounter AS e','r.eid','=','e.eid')
            ->where('r.type',$type)
            ->where('r.status',$status)
            ->where('r.date','>=',$datefrom)
            ->where('r.date','<=',$dateto)
            ->select('r.*','p.lastname','p.firstname','p.yob','t.name AS positionname','e.discharged')
            ->orderby('r.date')
            ->get();
        return Response::json($request);
    }


    public function getPacspatientbypid($pid,$dfrom="",$dto=""){
        $param = array(
            'a' => 'pat_list',
            'dfrom' => $dfrom,
            'dto' => $dto,
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
            'date' => $date,
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
        //test
//        return Response::json(array('data'=>array(
//            asset('images/xquang1.jpg'),
//            asset('images/xquang2.jpg'))));
    }
    public function getPacsapi($param){
        $ip = "http://10.0.0.6/api/index.php?c=api";//sau nay se lay tu csdl tung benh vien
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
        $Context = stream_context_create(array(
            'http' => array(
                'method' => 'GET',
                'timeout' => Config::get('main.timeout'), //<---- Here (That is in seconds)
            )
        ));
            try{
                $file = file_get_contents($ip.$url,false,$Context);
                if($file === false){
                    echo '';
                }
                else echo $file;
            }
            catch(\Exception $e){
                echo '';
            }

    }
}