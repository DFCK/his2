<?php
class TplController extends BaseController
{
    public function getHeader(){
        return View::make(Config::get('main.theme').'.layout.header');
    }
    public function getLeftpanel(){
        return View::make(Config::get('main.theme').'.layout.leftpanel');
    }
    public function getRibbon(){
        return View::make(Config::get('main.theme').'.layout.ribbon');
    }
    public function getFooter(){
        return View::make(Config::get('main.theme').'.layout.footer');
    }
    public function getShortcut(){
        return View::make(Config::get('main.theme').'.layout.shortcut');
    }
    public function getDashboard(){
    }
}