<?php
class PasController extends BaseController
{
    public function getRegistration(){
        return View::make(Config::get('main.theme').'.pas.registration');
    }

}