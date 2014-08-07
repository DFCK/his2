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
        $input['position'] = implode("$",$input['position']);
        $input['date'] = strtotime($input['date']);
        $chidinh = RISRequest::create($input);

        if($chidinh->id){
            echo RISRequest::where('eid',$input['eid'])->count();
        }
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
        $hospital = 74001;
        $type = 'sieuam';
        $data = array();
        return View::make(Config::get('main.theme') . '.ris.sieuam', $data);

    }
    public function getLoadsieuamrequest($date,$status=0){
        $datefrom = strtotime($date);
        $dateto = strtotime($date." 23:59:59");
        $request =  DB::table('dfck_ris_request AS r')
            ->join('dfck_person AS p','p.pid','=','r.pid')
            ->where('r.type','sieuam')
            ->where('r.status',$status)
            ->where('r.date','>=',$datefrom)
            ->where('r.date','<=',$dateto)
            ->select('r.*','p.lastname','p.firstname','p.yob')
            ->get();
//        var_dump($request);
        return Response::json($request);
    }
}