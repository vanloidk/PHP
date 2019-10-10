<?php

class Controller_Sale_Purch extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    public function action_index() {

        $view                    = View::forge('account/sale/purchase/index');
        //Model_Account::getOrder();
        $purchs                  = Model_Tpurch::find('all');
        $view->purchs            = $purchs;
        $this->template->title   = "Purchase";
        $this->template->content = $view;
    }

    public function action_purchdtl() {
        $view = View::forge('account/sale/purchase/purchdtl');

        $id                      = Input::get('id');
        $purchdtls               = Model_TshipDtl ::get_shipdtl_by_shipid($id);
        //var_dump($shipdtls); exit())
        $view->purchdtls         = $purchdtls;
        $this->template->title   = "Purchase detail";
        $this->template->content = $view;
    }

    public function action_delete() {
        $purch = Model_Tpurch::find(input::post('purchId'));
        $purch->delete();
    }

    public function action_purchDetail() {
        $view = View::forge('account/sale/purchase/purchdetail');

        $id                    = Input::get('id');
        $purchdtls             = Model_Tpurchdtl::get_purchdtl_by_purchid($id);
        $this->template->title = "Purch detail";

        $view->purchdtls          = $purchdtls;
        $this->template->content = $view;
    }

    public function action_register() {
        $view                    = View::forge('purch/register');
        $this->template->title   = "Register purch";
        $this->template->content = $view;
    }

}
