<?php
class SearchController extends BaseController
{
    public function getIndex($param = '')
    {
        if (strlen($param) == 12)
            $search = Person::where('pid', $param);
        else
            $search = Person::where('pid', 'like', '%' . $param)
                ->orwhere('firstname', 'like', '%' . $param . '%');
        if ($search->count() == 1) {
            return Redirect::action('PasController@getPerson', array('pid' => $search->first()->pid));
        }
        else if($search->count() == 0){
           $search = null;
        }
        else{
            $search = $search->orderby('firstname')->paginate(10);
        }
        $data = array(
            'search' => $search
        );
        return View::make(Config::get('main.theme') . '.misc.search', $data);

    }
}