<?php
class DashboardController extends BaseController
{
    public function getIndex(){
        return View::make(Config::get('main.theme').'.dashboard.dashboard');
    }
    public function getChangelang($index){
        App::setLocale(Config::get('main.language.'.$index));
//        echo App::getLocale();
        Session::put('locale', Config::get('main.language.'.$index));
        Session::put('localeindex', $index);
        return Redirect::to('/');
    }
}