<?php
class AdminController extends BaseController
{
    public function getModule()
    {
        return View::make(Config::get('main.theme') . '.admin.module');
    }
   public function getDmchucvu()
    {
        return View::make(Config::get('main.theme') . '.admin.dmchucvu');
    }
    public function postAdddmchucvu(){
        $input = Input::all();
        //var_dump($input);
        $chucvu = Dmchucvu::create($input['data']);
        echo $chucvu->id;
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
            'moduleicon' => $params['data']['moduleicon'],
        );

        //dau tien la tim xem code co bi trung khong?
        $find = Adminfunction::where('modulecode', $arr['modulecode'])
            ->where('id', '!=', $params['data']['id'])
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
//                $find->moduleorder = $arr['moduleorder'];
                $find->moduleicon = $arr['moduleicon'];
                echo $find->save();
            }
            else {
                //xu li insert moi
                $function = Adminfunction::create($arr);
                echo $function->id;

            }
        }
        else echo -1;
        //duplicate module code;

    }
    public function postDeletemodule(){
        $data = Input::all();
        echo Adminfunction::find($data['data']['id'])->delete();
    }
    public function getSelectlist()
    {
        return Adminfunction::where('moduleparent', '0')
            ->orderBy('moduleparent')
            ->orderBy('moduleorder')
            ->get()
            ->toJson();
    }

    public function getFunctionlist()
    {
        //$functions =  Adminfunction::getFunctionTree();

        //print_r($functions);
        //return Response::json($functions);
        return Adminfunction::orderBy('moduleparent')
            ->orderBy('moduleorder')->get()->toJson();
    }

    public function postChangemoduleorder()
    {
        $data = Input::all();
        $count = 0;
        $result = 0;
        foreach ($data['data'] as $id => $val) {
            $result += Adminfunction::where('id', $val['id'])->update(array('moduleorder' => $id, 'moduleparent' => 0));
            $count++;
            if (isset($val['children']) && count($val['children']) > 0) {
                foreach ($val['children'] as $idc => $valc) {
                    $result += Adminfunction::where('id', $valc['id'])->update(array('moduleorder' => $idc, 'moduleparent' => $val['id']));
                    $count++;
                }
            }
        }
        if ($count == $result) echo 1;
        else echo 0;
    }
}