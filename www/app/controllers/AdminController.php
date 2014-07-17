<?php
class AdminController extends BaseController
{
    public function getModule(){
        return View::make(Config::get('main.theme').'.admin.module');
    }
    public function postAddmodule(){
        $params = Input::all();
        $arr = array(
            'modulename' => $params['data']['modulename'],
            'moduleurl' => $params['data']['moduleurl'],
            'modulelang' => $params['data']['modulelang'],
            'moduleparent' => $params['data']['moduleparent'],
            'modulecode' => $params['data']['modulecode'],
        );
        $find = Adminfunction::where('modulecode',$arr['modulecode'])->count();
        if($find <=0){
            $function = Adminfunction::create($arr);
            echo $function->id;
        }
        else echo -1;//duplicate module code;
    }
    public function getFunctionlist(){
        //$functions =  Adminfunction::getFunctionTree();

        //print_r($functions);
        //return Response::json($functions);
        return   Adminfunction::orderBy('modulename')->get()->toJson();
    }
}