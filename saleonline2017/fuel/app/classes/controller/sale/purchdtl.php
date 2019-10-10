<?php

class Controller_Sale_Purchdtl extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    public function action_index() {

        $view = View::forge('account/sale/purchase/purchdtl');

        $purchdtls = Model_Tpurchdtl::get_all_purchdtl();

        $view->purchdtls         = $purchdtls;
        $this->template->title   = "Purch detail";
        $this->template->content = $view;
    }

    public function action_add() {

        $view      = View::forge('account/sale/purchase/purchdtl');
        $purchdtls = Model_Tpurchdtl::find('all');

        if (Input::method() == "POST") {
            $purchdtlNew               = new Model_Tpurchdtl();
            $purchdtlNew->purch_id     = 0;
            $purchdtlNew->product_name = Input::post('product_name');
            $purchdtlNew->price        = Input::post('price');
            $purchdtlNew->quantity     = Input::post('quantity');

            if ($purchdtlNew->save()) {
                Session::set_flash("success");
                Response::redirect('sale/purchDtl/');
            } else {
                Session::set_flash('error', "insert  success");
            }
        }

        $view->purchdtls         = $purchdtls;
        $this->template->title   = "Purch detail";
        $this->template->content = $view;
    }

    public function action_delete() {

        $purchdtl = Model_TpurchDtl::find(input::post('purchId'));
        $purchdtl->delete();
    }

    public function action_savePurch() {


        $view      = View::forge('account/sale/purchase/purchdtl');
        //get all shipdtl vs  caculator total insert in ship and product 
        $purchdtls = Model_Tpurchdtl::get_all_purchdtl();
        $idMin     = Model_Tpurchdtl::get_min_id_purchdtl();

        $totalPurch = 0;
        //update ship_id
        foreach ($purchdtls as $value) {
            $totalPurch += $value->price;
            $value->purch_id = "PUR" . $idMin;
            $value->save();
        }

        if ($idMin != NULL) {
            $purch             = new Model_Tpurch();
            $purch->id         = "PUR" . $idMin;
            $purch->name       = "purch" . $idMin;
            $purch->purch_date = date('Y-m-d');
            $purch->method     = "test";
            $purch->status     = 1;
            $purch->total_price = $totalPurch;
            $purch->company     = "viet nam";

            if ($purch->save()) {
                Response::redirect('sale/purch/');
            }
        }

        $view->purchdtls         = $purchdtls;
        $this->template->title   = "purchase";
        $this->template->content = $view;
    }

}
