<?php
class Adminfunction extends Eloquent{
    protected $table = 'dfck_function';
    protected $fillable = array('name', 'url','lang','parent','code','order','icon');

    public static function getFunctionTree($id = 0)
    {
        $funcs_array = array();

        $functions = Adminfunction::where('parent', $id)
            ->orderBy('order')
            ->orderBy('name')
            ->get();


        foreach ($functions as $func) {
            $funcs_array[$func->id] = array(
                 'id' => $func->id,
                 'name' => $func->name,
                 'url' => $func->url,
                 'lang' => $func->lang,
                 'order' => $func->order,
                 'parent' => $func->parent,
                 'code' => $func->code,
                 'icon' => $func->icon,

                'children' => array()
            );

            $funcs_array[$func->id]['children'] = Adminfunction::getFunctionTree($func->id);
        }

        return $funcs_array;
    }
}