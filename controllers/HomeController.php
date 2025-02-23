<?php
class HomeController extends BaseController {
    public function index() {
        $this->render('home', ['title' => 'Главная страница' ,'currentPath' => 'home']);
    }
}