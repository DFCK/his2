<?php
class EncounterTransfer extends Eloquent{
    protected $table='dfck_encounter_transfer';
    protected $fillable = array();

    /**
     * Định nghĩa các cột type
     * type: 0: tự đến, 1: chuyển viện, 2: cấp cứu,
     * 3: chuyển khoa, 4: chuyển khu, 5: chuyển phòng, 6: chuyển giường
     *
     *
     */
}