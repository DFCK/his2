<?php

class PasController extends BaseController
{
    public function getPerson($pid = '')
    {
        if (strlen($pid) > 0) {
            $data['pid'] = $pid;
//            $person = Person::where("pid", $pid)->province();
            $person = DB::table('dfck_person')
                ->leftJoin('dfck_address_province','dfck_address_province.code','=','dfck_person.province')
            ->select('dfck_address_province.name AS province_name')
                ->leftJoin('dfck_address_district','dfck_address_district.code','=','dfck_person.district')
            ->select('dfck_address_district.name AS district_name')
                ->leftJoin('dfck_address_ward','dfck_address_ward.code','=','dfck_person.addressward')
            ->select('dfck_address_ward.name AS ward_name')
                ->select('dfck_person.*');
//                ->select('dfck_person.*','dfck_address_province.name AS province_name');
            if ($person->count()) {
                $data['person'] = $person->get();
                $data['person'] = $data['person'][0];
                var_dump($data['person']);
                return View::make(Config::get('main.theme') . '.pas.person', $data);
            }

            else return View::make(Config::get('main.theme') . '.pas.registration', array("message" => "Không tìm thấy mã " . $pid));
        }
        else
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
        }
        else {
        }
    }

    public function getAlljobs()
    {
        return Jobs::all()->tojson();
    }

    public function getAllethnic()
    {
        return Ethnic::orderBy('order', 'DESC')->orderby('name')->get()->tojson();
    }

    public function getAllcountry()
    {
        return Country::orderby("order", "DESC")->orderBy("name")->get()->tojson();
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
    public function postSaveperson()
    {
        $input = Input::get('data');
//        return Response::json($input);
        if ($input['id'] <= 0) {
            $province = 711;
            $pid = Autoid::buildPID($province);
            if ($pid > 0) {
                $input['pid'] = $pid;
                if ($input['dob'] != '') {
                    $input['dob'] = strtotime( substr($input['dob'], 4, 4) . '-' . substr($input['dob'], 2, 2) . '-' . substr($input['dob'], 0, 2));
                }
                if ($input['insurancefromdate'] != '') {
                    $input['insurancefromdate'] = strtotime( substr($input['insurancefromdate'], 4, 4) . '-' . substr($input['insurancefromdate'], 2, 2) . '-' . substr($input['insurancefromdate'], 0, 2));
                }
                if ($input['insurancetodate'] != '') {
                    $input['insurancetodate'] = strtotime( substr($input['insurancetodate'], 4, 4) . '-' . substr($input['insurancetodate'], 2, 2) . '-' . substr($input['insurancetodate'], 0, 2));
                }
                if ($input['dateissue'] != '') {
                    $input['dateissue'] = strtotime( substr($input['dateissue'], 4, 4) . '-' . substr($input['dateissue'], 2, 2) . '-' . substr($input['dateissue'], 0, 2));
                }
                $person = Person::create($input);
                return $person->pid;
            }
            else return -99;
            //ko tao dc pid

        }
        else {

        }
    }

}