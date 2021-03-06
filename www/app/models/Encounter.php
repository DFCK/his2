<?php
class Encounter extends Eloquent{
    protected $table = 'dfck_encounter';
    protected $fillable = array('pid','eid','firstdiagnosiscode','firstdiagnosis','diagnosiscode','diagnosis',
    'subdiagnosiscodelist','subdiagnosislist','tienluong','typeexam','summary','datein','dateout',
    'insurancecode','insurancefromdate','insurancetodate','insuranceplace',
    'hospital_code','dept_code','ward_code','created_by');

    /**
     * Định nghĩa các trường
     * discharged: 0: đang điều trị, 7: xuất viện, 8: chuyển viện, 9: trốn viện
     */


    public static function getAdmithistory($pid){
        $admithistory = Encounter::where('pid',$pid)->orderby('datein','DESC')->select('eid','datein','dateout','diagnosis')->get();
        if($admithistory){
            $admithistory = $admithistory->tojson();
        }
        else $admithistory = null;
        return $admithistory;
    }
}