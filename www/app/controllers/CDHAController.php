<?php
class CDHAController extends BaseController
{
    public function getDistricttitle($page = 1, $code)
    {
        Input::merge(array('page' => $page));
        return AddressDistrict::where("province_code", "=", "$code")->paginate(10)->toJson();
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