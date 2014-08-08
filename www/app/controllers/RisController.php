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
    public function getSieuam(){
        $data['hospital'] = 74001;
        $data['type'] = 'sieuam';
        return View::make(Config::get('main.theme') . '.ris.sieuam', $data);

    }
    public function getXquang(){
        $data['hospital'] = 74001;
        $data['type'] = 'xquang';
        return View::make(Config::get('main.theme') . '.ris.xquang', $data);

    }
    public function getLoadsieuamtemplate($type,$code){
        $template = TypeCDHA::where('code',$code)->first();
        if($template->template != "") echo $type->template;
        else{
            $template = TypeCDHA::where('code','=',$type.'0')->first();
            echo $template->template;
        }
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

    public function getLoadsieuamrequest($date,$status=0){
        $datefrom = strtotime($date);
        $dateto = strtotime($date." 23:59:59");
        $request =  DB::table('dfck_ris_request AS r')
            ->join('dfck_person AS p','p.pid','=','r.pid')
            ->join('dfck_type_cdha AS t','t.code','=','r.position')
            ->where('r.type','sieuam')
            ->where('r.status',$status)
            ->where('r.date','>=',$datefrom)
            ->where('r.date','<=',$dateto)
            ->select('r.*','p.lastname','p.firstname','p.yob','t.name AS positionname')
            ->orderby('r.date')
            ->get();
//        var_dump($request);
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
//        var_dump($request);
        return Response::json($request);
    }
}