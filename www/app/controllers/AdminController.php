<?php
class AdminController extends BaseController
{
    public function getModule(){
        return View::make(Config::get('main.theme').'.admin.module');
    }
}