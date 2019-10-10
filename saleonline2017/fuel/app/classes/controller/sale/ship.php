<?php

class Controller_Sale_Ship extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    public function action_index() {

        $view  = View::forge('account/sale/ship/index');
        $ships = Model_Tship::find('all');

        $view->ships             = $ships;
        $this->template->title   = "Shipping";
        $this->template->content = $view;
    }

    public function action_delete() {

        $ship = Model_Tship::find(input::post('shipId'));
        $ship->delete();
    }

    public function action_shipDetail() {
        $view = View::forge('account/sale/ship/shipdetail');

        $id                    = Input::get('id');
        $purchdtls             = Model_TshipDtl::get_shipdtl_by_shipid($id);
        $this->template->title = "Purch detail";

        $view->shipdtls          = $purchdtls;
        $this->template->content = $view;
    }

}
