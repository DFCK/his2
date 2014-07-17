<?php
class AdminController extends BaseController
{
    public function getModule()
    {
        return View::make(Config::get('main.theme') . '.admin.module');
    }

    public function postAddmodule()
    {
        $params = Input::all();
        $arr = array(
            'modulename' => $params['data']['modulename'],
            'moduleurl' => $params['data']['moduleurl'],
            'modulelang' => $params['data']['modulelang'],
            'moduleparent' => $params['data']['moduleparent'],
            'modulecode' => $params['data']['modulecode'],
            'moduleorder' => $params['data']['moduleorder'],
        );

        //dau tien la tim xem code co bi trung khong?
        $find = Adminfunction::where('modulecode', $arr['modulecode'])
            ->where('id','!=',$params['data']['id'])
            ->count();
        if ($find <= 0) {
            $find = null;
            //neu co truyen ve id => update
            if ($params['data']['id'] && $params['data']['id'] > 0) {
                $find = Adminfunction::find($params['data']['id']);
            }
            //xu li update
            if ($find) {
                $find->modulename = $arr['modulename'];
                $find->moduleurl = $arr['moduleurl'];
                $find->modulelang = $arr['modulelang'];
                $find->moduleparent = $arr['moduleparent'];
                $find->modulecode = $arr['modulecode'];
                $find->moduleorder = $arr['moduleorder'];
                echo $find->save();
            } else {
                //xu li insert moi
                $function = Adminfunction::create($arr);
                echo $function->id;

            }
        } else echo -1;
        //duplicate module code;

    }

    public function getFunctionlist()
    {
        //$functions =  Adminfunction::getFunctionTree();

        //print_r($functions);
        //return Response::json($functions);
        return Adminfunction::orderBy('moduleparent')
            ->orderBy('moduleorder')->get()->toJson();
    }
}