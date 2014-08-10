<?php
class Encounter extends Eloquent{
    protected $table = 'dfck_encounter';
    protected $fillable = array('pid','eid','firstdiagnosiscode','firstdiagnosis','diagnosiscode','diagnosis',
    'subdiagnosiscodelist','subdiagnosislist','tienluong','typeexam','summary','datein','dateout',
    'insurancecode','insurancefromdate','insurancetodate','insuranceplace',
    'hospital_code','dept_code','ward_code');

    /**
     * Định nghĩa các trường
     * discharged: 0: đang điều trị, 7: xuất viện, 8: chuyển viện, 9: trốn viện
     */
}