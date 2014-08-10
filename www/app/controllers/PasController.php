<?php

class PasController extends BaseController
{
    public function getPerson($pid = '')
    {
        if (strlen($pid) > 0) {
            $data['pid'] = $pid;
            $person = Person::getPersonInfo($pid);

            if ($person->pid) {
                $data['person'] = $person;
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
        $hospital_code = 74001;
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
                else  unset($input['dob']);
                if ($input['insurancefromdate'] != '') {
                    $input['insurancefromdate'] = strtotime(substr($input['insurancefromdate'], 4, 4) . '-' . substr($input['insurancefromdate'], 2, 2) . '-' . substr($input['insurancefromdate'], 0, 2));
                }
                if ($input['insurancetodate'] != '') {
                    $input['insurancetodate'] = strtotime(substr($input['insurancetodate'], 4, 4) . '-' . substr($input['insurancetodate'], 2, 2) . '-' . substr($input['insurancetodate'], 0, 2));
                }
                if ($input['dateissue'] != '') {
                    $input['dateissue'] = strtotime(substr($input['dateissue'], 4, 4) . '-' . substr($input['dateissue'], 2, 2) . '-' . substr($input['dateissue'], 0, 2));
                }
                $input['hospital_code'] = $hospital_code;
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
            else{
                 unset($input['dob']);

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

    /**
     * Quan ly sinh hieu
     */
    public function postSavevitalsign(){
        $hospital_code = 74001;
        $input = Input::get('data');
        if($input['id']=='' || $input['id']==0){
            $input['pid'] = (int)$input['pid'];
            VitalSign::where('pid',$input['pid'])
                ->where('eid','0')
                ->delete();
            $input['date'] = strtotime($input['date']);
            $input['hospital_code'] = $hospital_code;
            $sh = VitalSign::create($input);
            echo $sh->id;
        }
        else{
            echo VitalSign::find($input['id'])->update($input);
        }
    }
    public function getLoadvitalsign($pid){
        return VitalSign::withTrashed()->where('pid',$pid)->get()->tojson();
    }
    public function deleteDelvitalsign($id){
        echo VitalSign::find($id)->delete();
    }


    /**
     * Quan ly hoi benh
     */
    public function postSaveadmissioninfo(){
        $hospital_code = 74001;
        $input = Input::get('data');
        $d =  $input['date'];
        $input['date'] = strtotime($d);
//        else $input['date'] = strtotime(substr($d,4,4)."-".substr($d,2,2)."-".substr($d,0,2)." ".substr($d,8,2).":".substr($d,10,2));
        if($input['id']=='' || $input['id']==0){
            $input['pid'] = (int)$input['pid'];
            PersonAdmissionInfo::where('pid',$input['pid'])
                ->where('eid','0')
                ->delete();
            $input['hospital_code'] = $hospital_code;
            $sh = PersonAdmissionInfo::create($input);
            echo $sh->id;
        }
        else{
            echo PersonAdmissionInfo::find($input['id'])->update($input);
        }
    }
    public function getLoadadmissioninfo($pid){
        return PersonAdmissionInfo::withTrashed()->where('pid',$pid)->get()->tojson();
    }
    public function deleteDeladmissioninfo($id){
        echo PersonAdmissionInfo::find($id)->delete();
    }

}