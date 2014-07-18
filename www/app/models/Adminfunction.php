<?php
class Adminfunction extends Eloquent{
    protected $table = 'dfck_function';
    protected $fillable = array('modulename', 'moduleurl','modulelang','moduleparent','modulecode','moduleorder','moduleicon');

    public static function getFunctionTree($id = 0)
    {
        $funcs_array = array();

        $functions = Adminfunction::where('moduleparent', $id)
            ->orderBy('moduleorder')
            ->orderBy('modulename')
            ->get();


        foreach ($functions as $func) {
            $funcs_array[$func->id] = array(
                 'id' => $func->id,
                 'modulename' => $func->modulename,
                 'moduleurl' => $func->moduleurl,
                 'modulelang' => $func->modulelang,
                 'moduleorder' => $func->moduleorder,
                 'moduleparent' => $func->moduleparent,
                 'modulecode' => $func->modulecode,
                 'moduleicon' => $func->moduleicon,

                'children' => array()
            );

            $funcs_array[$func->id]['children'] = Adminfunction::getFunctionTree($func->id);
        }

        return $funcs_array;
    }
}