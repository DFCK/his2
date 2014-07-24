<?php

class PasController extends BaseController
{
    public function getPerson()
    {
        return View::make(Config::get('main.theme') . '.pas.registration');
    }

    public function getSearchshortcut($shorcut)
    {
        //double code CMTVKH
        $ward = AddressWard::where('shortcut', $shorcut);
        if ($ward) {
            if ($ward->count() == 1) {
                $ward = $ward->first()->toArray();
                $district = AddressDistrict::where("code", $ward['district_code'])->first()->toArray();
                $province = AddressProvince::where("code", $district['province_code'])->first()->toArray();
                return Response::json(array(
                    'type' => 1,
                    'ward' => $ward,
                    'district' => $district,
//                    'alldistrict' => AddressDistrict::where("province_code",$province['code'])->get()->toArray(),
//                    'allward' => AddressWard::where("district_code",$district['code'])->get()->toArray(),
                    'province' => $province,
                ));
            }
        } else {
        }
    }

    public function getAllprovince($countrycode = 'vn')
    {
        return AddressProvince::orderBy('name')->get()->tojson();
    }

    public function getAlldistrict($province)
    {
        return AddressDistrict::where('province_code', $province)->orderBy('name')->get()->tojson();
    }

    public function getAllward($district)
    {
        return AddressWard::where('district_code', $district)->orderBy('name')->get()->tojson();
    }

    public function getBvdkbd($dkbd)
    {
        $bv = InsurancePlace::where('code', $dkbd)->first();
        if ($bv)
            return $bv->toJson();
    }

}