<?php

class PasController extends BaseController
{
    public function getPerson($pid = '')
    {
        if (strlen($pid) > 0) {
            $data['pid'] = $pid;
//            $person = Person::where("pid", $pid)->province();
            $person = DB::table('dfck_person AS p')
                ->join('dfck_address_ward AS w', 'w.code', '=', 'p.addressward')
                ->join('dfck_address_district AS d', 'd.code', '=', 'p.district')
                ->join('dfck_address_province AS pr', 'pr.code', '=', 'p.province')
                ->join('dfck_type_jobs AS j', 'j.code', '=', 'p.careercode')
                ->join('dfck_type_ethnic AS e', 'e.code', '=', 'p.ethnic')
                ->leftJoin('dfck_noicap_bhyt AS n', 'n.code', '=', 'p.insuranceplace')
                ->where("p.pid", $pid)
                ->select('p.*', 'pr.name AS province_name', 'd.name AS district_name', 'w.name AS ward_name', 'j.namevn AS career',
                    'e.name AS ethnicname', 'n.name AS insurancename')
                ->get();
            if ($person) {
                $data['person'] = $person[0];
                return View::make(Config::get('main.theme') . '.pas.person', $data);
            }

            else return View::make(Config::get('main.theme') . '.pas.registration', array("message" => "Không tìm thấy mã " . $pid));
        }
        else
            return View::make(Config::get('main.theme') . '.pas.registration');

    }

    public function getEditperson($pid)
    {
        $data['pid'] = $pid;
        $person = Person::where("pid", $pid)->get();
//        echo '<pre>';print_r($person);
        if ($person->count()==0) {
            $data['pid'] == '';
            $data['message'] = "Không tìm thấy mã " . $pid;
        }
        else{
            $person = $person[0];
            if($person->dob!='') $person['dob'] = date("dmY",$person->dob);
            if($person->insurancefromdate!='') $person['insurancefromdate'] = date("dmY",$person->insurancefromdate);
            if($person->insurancetodate!='') $person['insurancetodate'] = date("dmY",$person->insurancetodate);
            if($person->dateissue!='') $person['dateissue'] = date("dmY",$person->dateissue);
            $data['person'] = $person->tojson();
        }
        return View::make(Config::get('main.theme') . '.pas.registration',$data);
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
        if ($input['pid'] <= 0 || $input['pid']=='') {
            $province = 711;  // sua lai cho nay khi co danh sach benh vien
            $pid = Autoid::buildPID($province);
            if ($pid > 0) {
                $input['pid'] = $pid;
                if ($input['dob'] != '') {
                    $input['dob'] = strtotime(substr($input['dob'], 4, 4) . '-' . substr($input['dob'], 2, 2) . '-' . substr($input['dob'], 0, 2));
                }
                if ($input['insurancefromdate'] != '') {
                    $input['insurancefromdate'] = strtotime(substr($input['insurancefromdate'], 4, 4) . '-' . substr($input['insurancefromdate'], 2, 2) . '-' . substr($input['insurancefromdate'], 0, 2));
                }
                if ($input['insurancetodate'] != '') {
                    $input['insurancetodate'] = strtotime(substr($input['insurancetodate'], 4, 4) . '-' . substr($input['insurancetodate'], 2, 2) . '-' . substr($input['insurancetodate'], 0, 2));
                }
                if ($input['dateissue'] != '') {
                    $input['dateissue'] = strtotime(substr($input['dateissue'], 4, 4) . '-' . substr($input['dateissue'], 2, 2) . '-' . substr($input['dateissue'], 0, 2));
                }
                $person = Person::create($input);
                return $person->pid;
            }
            else return -99;
            //ko tao dc pid

        }
        else {
            if ($input['dob'] != '') {
                $input['dob'] = strtotime(substr($input['dob'], 4, 4) . '-' . substr($input['dob'], 2, 2) . '-' . substr($input['dob'], 0, 2));
            }
            if ($input['insurancefromdate'] != '') {
                $input['insurancefromdate'] = strtotime(substr($input['insurancefromdate'], 4, 4) . '-' . substr($input['insurancefromdate'], 2, 2) . '-' . substr($input['insurancefromdate'], 0, 2));
            }
            if ($input['insurancetodate'] != '') {
                $input['insurancetodate'] = strtotime(substr($input['insurancetodate'], 4, 4) . '-' . substr($input['insurancetodate'], 2, 2) . '-' . substr($input['insurancetodate'], 0, 2));
            }
            if ($input['dateissue'] != '') {
                $input['dateissue'] = strtotime(substr($input['dateissue'], 4, 4) . '-' . substr($input['dateissue'], 2, 2) . '-' . substr($input['dateissue'], 0, 2));
            }
            unset($input['id']);
            $pid = $input['pid'];
            //unset($input['pid']);
            unset($input['age']);
            unset($input['career']);
            $effect = Person::where('pid','=',$pid)->update($input);
            return $effect;
        }
    }

}