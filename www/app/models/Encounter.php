<?php
class Encounter extends Eloquent{
    protected $table = 'dfck_encounter';
    protected $fillable = array('pid','eid','firstdiagnosiscode','firstdiagnosis','diagnosiscode','diagnosis',
    'subdiagnosiscodelist','subdiagnosislist','tienluong','typeexam','summary','datein','dateout',
    'insurancecode','insurancefromdate','insurancetodate','insuranceplace');
}