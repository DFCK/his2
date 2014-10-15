<?php
class CDHAController extends BaseController
{
    public function getCdha($page = 1)
    {
        Input::merge(array('page' => $page));
        return TypeCDHA::paginate(10)->toJson();
    }

    public function getType($page=1){
        Input::merge(array('page'=>$page));
        return TypeCDHA::select("type")->paginate(10)->distinct()->toJson();
    }

    public function getIndex()
    {
        return View::make(Config::get('main.theme') . '.hrm.cdha');
    }


    public function postSave($tpl)
    {
        $param = Input::get('data');
        if ($tpl == "dist") {
            if ($param['id'] == "") {
                $title = AddressDistrict::create($param);
                echo $title->id;
            } else {
                $count = AddressDistrict::find($param['id'])->update($param);
                echo $count;

            }
        }
    }

    public function deleteDeletedist($id)
    {
        $count = AddressDistrict::find($id)->delete();
        echo $count;
    }
}