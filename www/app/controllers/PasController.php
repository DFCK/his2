<?php
class PasController extends BaseController
{
    public function getPerson(){
        return View::make(Config::get('main.theme').'.pas.registration');
    }

}