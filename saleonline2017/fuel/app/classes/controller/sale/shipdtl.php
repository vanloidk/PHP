<?php

class Controller_Sale_Shipdtl extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    public function action_index() {

        $view = View::forge('account/sale/ship/shipdtl');

        $shipdtls = Model_TshipDtl::get_all_shipdtl();

        $view->shipdtls          = $shipdtls;
        $this->template->title   = "Ship detail";
        $this->template->content = $view;
    }

    public function action_add() {

        $view     = View::forge('account/sale/ship/shipdtl');
        $shipdtls = Model_TshipDtl::find('all');

        if (Input::method() == "POST") {
            $shipdtlNew               = new Model_TshipDtl();
            $shipdtlNew->ship_id      = 0;
            $shipdtlNew->product_name = Input::post('product_name');
            $shipdtlNew->price        = Input::post('price');
            $shipdtlNew->quantity     = Input::post('quantity');
            $shipdtlNew->inventory    = 1;

            if ($shipdtlNew->save()) {
                Session::set_flash("success");
                Response::redirect('sale/shipDtl/');
            } else {
                Session::set_flash('error', "insert  success");
            }
        }
        $view->shipdtls = $shipdtls;

        $this->template->title   = "Ship detail";
        $this->template->content = $view;
    }

    public function action_delete() {

        $shipdtl = Model_TshipDtl::find(input::post('shipId'));
        $shipdtl->delete();
    }

    public function action_saveShip() {


        $view     = View::forge('account/sale/ship/shipdtl');
        //get all shipdtl vs  caculator total insert in ship and product 
        $shipdtls = Model_TshipDtl::get_all_shipdtl();
        $idMin    = Model_TshipDtl::get_min_id_shipdtl();


        $totalShip = 0;
        //update ship_id
        foreach ($shipdtls as $value) {
            $totalShip += $value->price;
            $value->ship_id = "SH" . $idMin;
            $value->save();
        }

        if ($idMin != NULL) {
            $ship               = new Model_Tship();
            $ship->id           = "SH" . $idMin;
            $ship->name         = "ship" . $idMin;
            $ship->method       = "test";
            $ship->from_company = "AAA";
            $ship->to_company   = "BBB";
            $ship->ship_date    = date('Y-m-d');
            $ship->status       = 1;
            $ship->total_price  = $totalShip;
            $ship->created_date = date('Y-m-d');
            $ship->updated_date = date('Y-m-d');

            if ($ship->save()) {
                Response::redirect('sale/ship/');
            }
        }

        $view->shipdtls          = $shipdtls;
        $this->template->title   = "Register ship";
        $this->template->content = $view;
    }

}
