<?php
class AddressController extends BaseController
{

    public function getCountrytitle($page = 1)
    {
        Input::merge(array('page' => $page));
        return Country::paginate(10)->toJson();
    }

    public function getProvincetitle($page = 1)
    {
        Input::merge(array('page' => $page));
        return AddressProvince::paginate(10)->toJson();
    }

    public function getDistricttitle($page = 1, $code)
    {
        Input::merge(array('page' => $page));
        return AddressDistrict::where("province_code", "=", "$code")->paginate(10)->toJson();
    }

    public function getWardtitle($page = 1, $code)
    {
        Input::merge(array('page' => $page));
        return AddressWard::where("district_code", "=", "$code")->paginate(10)->toJson();
    }

    public function getIndex()
    {
        return View::make(Config::get('main.theme') . '.hrm.address');
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
        else if ($tpl == "ward") {
            if ($param['id'] == "") {
                $title = AddressWard::create($param);
                echo $title->id;
            } else {
                $count = AddressWard::find($param['id'])->update($param);
                echo $count;

            }
        }
    }

    public function deleteDeletedist($id)
    {
        $count = AddressDistrict::find($id)->delete();
        echo $count;
    }
    public function deleteDeleteward($id)
    {
        $count = AddressWard::find($id)->delete();
        echo $count;
    }
}