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
    public function getAlljobs(){
        return Jobs::all()->tojson();
    }
    public function getAllethnic(){
        return Ethnic::orderBy('order','DESC')->orderby('name')->get()->tojson();
    }
    public function getAllcountry(){
        return Country::orderby("order","DESC")->orderBy("name")->get()->tojson();
    }
    public function getAllprovince($countrycode = 'VN')
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

    /**
     * Lưu người mới, tạo mã con người cau truc Tinh-year-stt = 12 so
     * @return mixed
     */
    public function postSaveperson(){
        $input = Input::get('data');
//        return Response::json($input);
        if($input['id']<=0){
            $province = 711;
            $pid = Autoid::buildPID($province);
            //$person = Person::create($input);
            //return $person->id;
        }
        else{

        }
    }

}