<?php
class EncounterTransfer extends Eloquent{
    protected $table='dfck_encounter_transfer';
    protected $fillable = array('eid','pid','type',
    'fromhospital','fromdept','fromward','fromroom','frombed',
    'tohospital','todept','toward','toroom','tobed',
    'comment','date','staff');

    /**
     * Định nghĩa các cột type
     * type: 0: tự đến, 1:  cấp cứu, 2:   chuyển viện đến
     * 3: chuyển khoa, 4: chuyển khu, 5: chuyển phòng, 6: chuyển giường, 7: xuất viện, 8: chuyển viện đi, 9: trốn viện
     *
     */
}