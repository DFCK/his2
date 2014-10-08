<?php
class MiscController extends BaseController{
    public function getChangepass(){

    }
    public function getNews(){
        $data['function_code'] = 'miscnews';
        $hospital = Session::get('user.hospital_code');
        $data['dept'] = json_encode(Employee::getNewsDept($data['function_code']));
        $data['deptlist'] = Department::where('hospital_code',$hospital)->get()->tojson();
        return View::make(Config::get('main.theme') . '.misc.createnews', $data);
    }
    public function postSavenews(){
        $input = Input::get('data');
        if($input['id'] == ''){
            $input['created_by'] = Session::get('user.pid');
            $input['hospital_code'] = Session::get('user.hospital_code');
            $input['created_time'] = time();
            $news = News::create($input);
            if($news)
                echo $news->id;
            else echo -1;
        }
        else{
            echo News::find($input['id'])->update($input);
        }
    }
    public function getLoadlistnews($page,$place){
        Input::merge(array('page' => $page));
        $hospital_code = Session::get('user.hospital_code');
        $newslist = News::where('hospital_code',$hospital_code)
            ->where('place',$place)
            ->orderby('id','DESC')
            ->select('id','title','created_at','shortinfo','created_time')
            ->paginate(20)->tojson();
        return $newslist;
    }
    public function getLoad1news($id){
        $hospital_code = Session::get('user.hospital_code');
        $news = News::find($id);
        if($news) return Response::json($news);
        else return "";
    }
}