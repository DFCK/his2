<?php
class Autoid extends Eloquent
{
    protected $table = 'dfck_autoid';

    public static function buildPID($province)
    {

        //reset if change year
        $autoid = Autoid::where('name', 'pid' . $province)->first();
        if ($autoid->year < date("Y"))
            Autoid::where('name', 'pid' . $province)
                ->update(array('year' => date("Y"), 'current' => 0, 'reseted_at' => DB::raw("NOW()")));
        $pid = 0;
//        $db = DB::connection();
//
//        $stmt = $db->getPdo()->prepare("CALL buildpid (?,?)");
//
//        $stmt->bindParam(1, $province,PDO::PARAM_INT);
//        $stmt->bindParam(2, $pid,PDO::PARAM_INT);
//        $stmt->execute();
//
//        $search = array();
//        do {
//            $search = $stmt->fetchAll(PDO::FETCH_CLASS, 'stdClass');
//            var_dump($search);
//        } while ($stmt->nextRowset());
//        $stmt->closeCursor();
        DB::select("CALL buildpid(?,@number)", array($province));
        $result = DB::select('SELECT @number AS pid');
        if ($result) {
            $pid = $result[0]->pid;
            $stt = "";
            for ($i = ($autoid->length - 3 - 2 - strlen($pid)); $i > 0; $i--) {
                $stt .= "0";
            }
            return $province . date("y") . $stt . $pid;
        }
        else 0;
    }
}