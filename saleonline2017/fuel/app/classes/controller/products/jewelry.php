<?php

class Controller_Products_jewelry extends Controller_Base {

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {

        $view = View::forge('products/jewelry/index');

        //dong ho  1
        $clocks      = Model_Tproduct::getProductsByCategoryID(1);
        //nhan 2
        $rings       = Model_Tproduct::getProductsByCategoryID(2);
        //day chuyen 3
        $necklaces   = Model_Tproduct::getProductsByCategoryID(3);
        //lactay lacchan 4
        $bangles     = Model_Tproduct::getProductsByCategoryID(4);
        //hopdungtrangsu 5
        $jewelry_box = Model_Tproduct::getProductsByCategoryID(5);
        //bong tai 6
        $earrings    = Model_Tproduct::getProductsByCategoryID(6);

        $view->clocks      = $clocks;
        $view->rings       = $rings;
        $view->necklaces   = $necklaces;
        $view->bangles     = $bangles;
        $view->jewelry_box = $jewelry_box;
        $view->earrings    = $earrings;

        $this->template->title   = "Trang sức";
        //$this->template->number_carts = count(Session::get('carts'));
        $this->template->content = $view;
    }

    /**
     * Edit Shift Position
     *
     * @param int $id IdPosition
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_saleoff($id = null) {
        $view                = View::forge('position/edit');
        $view->error         = array();
        $view->shiftPosition = Model_Mstshiftposition::find($id);
        if (!$view->shiftPosition) {
            Session::set_flash('warning', __('message.:label_does_not_exist', array('label' => __('common.position'))));
            Response::redirect('position/index');
        }
        $mst_shift_position = $view->shiftPosition;
        //for case post
        if (Input::method() == "POST") {
            //existed position_name
            $val = Model_Mstshiftposition::validate('edit_position', $mst_shift_position);
            if ($val->run()) {
                $mst_shift_position->position_name = Input::post('position_name');
                $lock_post                         = Input::post('lock');
                if (empty($lock_post)) {
                    $mst_shift_position->lock = false;
                } else {
                    $mst_shift_position->lock = true;
                }

                //check position in mst_group
                $str_group_name = Model_Mstgroup::get_list_group_name_by_position($id);
                if ($str_group_name != "" && $mst_shift_position->lock == true) {
                    Session::set_flash('warning', __('message.position_lock_warning_:group_name', array('group_name' => $str_group_name)));
                } else {
                    if (!$mst_shift_position->save()) { //error transaction
                        Session::set_flash('error', __('message.registration_failed'));
                    } else {
                        Session::set_flash('success', __('message.position_:position_edited', array('position' => $mst_shift_position->position_name)));
                        Response::redirect('position/index');
                    }
                }
            } else {
                Session::set_flash('error', __('message.validation_error'));
                $view->error = $val->error_message();
            }
        }
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.position')));
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
