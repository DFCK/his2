<?php
class PasController extends BaseController
{
    public function getPerson(){
        return View::make(Config::get('main.theme').'.pas.registration');
    }
    public function getSearchshortcut($shorcut){
        $ward = AddressWard::where('shortcut',$shorcut)->first();
        if($ward){
            echo $ward['district_code'];
//            var_dump($ward);
//          return Response::json($ward);
               $district = AddressDistrict::where("code",$ward['district_code'])->first();
               $province = AddressProvince::where("code",$district['province_code'])->first();
            return Response::json(array(
                'ward' => $ward,
                'district' => $district,
                'province' => $province,
            ));

        }
        else{
        }
    }

}