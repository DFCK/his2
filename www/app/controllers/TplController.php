<?php
class TplController extends BaseController
{
    public function getHeader(){
        return View::make(Config::get('main.theme').'.layout.header');
    }
    public function getLeftpanel(){
        $data['categories'] = Adminfunction::getFunctionTree(0);
        return View::make(Config::get('main.theme').'.layout.leftpanel',$data);
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
    public function getSinhhieu(){
        return View::make(Config::get('main.theme').'.pas.modalsinhhieu');
    }
    public function getTtnhapvien(){
        return View::make(Config::get('main.theme').'.pas.modalttnhapvien');
    }
    public function getOutpatientroom(){
        return View::make(Config::get('main.theme').'.radt.outpatientroom');
    }
    public function getRoomqueue(){
        return View::make(Config::get('main.theme').'.radt.roomqueue');
    }
    public function getChidinhcdha(){
        return View::make(Config::get('main.theme').'.ris.modalchidinhcdha');
    }
}