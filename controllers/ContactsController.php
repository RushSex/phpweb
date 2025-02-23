<?php
class ContactsController extends BaseController {
    public function index() {
        $this->render('contacts', ['title' => 'Контакты','currentPath' => 'contacts']);
    }
}