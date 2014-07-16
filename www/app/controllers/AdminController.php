<?php
class AdminController extends BaseController
{
    public function getModule(){
        return View::make(Config::get('main.theme').'.admin.module');
    }
    public function postAddmodule(){
        $params = Input::all();
        $arr = array(
            'modulename' => $params['data']['name'],
            'moduleurl' => $params['data']['url'],
            'modulelang' => $params['data']['lang'],
            'moduleparent' => $params['data']['parent'],
        );
        $function = Adminfunction::create($arr);
        echo $function->id;
//        return Response::json($params);
    }
}