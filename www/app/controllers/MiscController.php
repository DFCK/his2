<?php
class MiscController extends BaseController{
    public function getChangepass(){

    }
    public function getNews(){
        $data['function_code'] = 'miscnews';
        $hospital = Session::get('user.hospital_code');
        $data['dept'] = Employee::getNewsDept($data['function_code']);
        $data['deptlist'] = Department::where('hospital_code',$hospital)->get()->tojson();
        return View::make(Config::get('main.theme') . '.misc.createnews', $data);
    }
}