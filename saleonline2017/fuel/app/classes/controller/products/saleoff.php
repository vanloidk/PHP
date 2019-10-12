<?php

class Controller_Products_Saleoff extends Controller_Base {

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {

        $view = View::forge('products/saleoff/index');

        //bong tai 6
        $earrings    = Model_Tproduct::getProductsSaleOff(6);
        //nhan 2
        $rings       = Model_Tproduct::getProductsSaleOff(2);
        //day chuyen 3
        $necklaces   = Model_Tproduct::getProductsSaleOff(3);
        //lactay lacchan 4
        $bangles     = Model_Tproduct::getProductsSaleOff(4);
        //hopdungtrangsu 5
        $jewelry_box = Model_Tproduct::getProductsSaleOff(5);
        //dong ho  1
        $clocks      = Model_Tproduct::getProductsSaleOff(1);

        $view->clocks      = $clocks;
        $view->rings       = $rings;
        $view->necklaces   = $necklaces;
        $view->bangles     = $bangles;
        $view->jewelry_box = $jewelry_box;
        $view->earrings    = $earrings;

        $this->template->title   = "Hàng giảm giá";
        //$this->template->number_carts = count(Session::get('carts'));
        $this->template->content = $view;
    }

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_detail($id = null) {

        $view     = View::forge('products/detail');
        $products = Model_Tproduct::getProducts($id);

        $this->template->title        = "details";
        $this->template->number_carts = count(Session::get('carts'));
        $view->products               = $products;
        $this->template->content      = $view;
    }

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_cart($id = null) {
        $cart_dto              = new Dto_Cart();
        $cart_dto->id          = $id;
        $cart_dto->total_items = 1;

        $arr_cart = array();

        if (!empty(Session::get('carts'))) {

            $flag      = true;
            $arr_tmp[] = array("id" => $id, "total_items" => 1);
            $len       = count(Session::get('carts'));
            $arr_cart  = Session::get('carts');

            for ($i = 0; $i < $len; $i++) {
                if ($arr_cart[$i]->id == $id) {
                    $cart_dto->total_items = $arr_cart[$i]->total_items + 1;
                    $arr_tmp[$i]           = $cart_dto;
                    $flag                  = false;
                } else {
                    $arr_tmp[$i] = $arr_cart[$i];
                }
            }

            if ($flag) {
                $arr_tmp[$len] = $cart_dto;
                $flag          = true;
            }

            Session::set('carts', $arr_tmp);
        } else {
            $arr_cart2    = array();
            $arr_cart2[0] = $cart_dto;
            Session::set('carts', $arr_cart2);
        }

        Response::redirect('sanpham');
    }

    /**
     * Edit products
     *
     * @param int $id product
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     */
    public function action_search() {

        $products = Model_Tproduct::getProductsByConditionSearch(Input::post('txt_search'));
        $view     = View::forge('products/search');

        $view->products          = $products;
        $this->template->title   = "Sản phẩm";
        $this->template->content = $view;
    }

}
