<?php

/**
 * /position.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license 
 */

/**
 * Position
 *
 * <pre>
 * </pre>
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license 
 */
class Controller_Products_earring extends Controller_Base {

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {

        $total_items = Model_Tproduct::countProductsPagination(6);

        $config = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:80/saleonline/html/products/earring/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Fuel\Core\Pagination::forge('products/earring/', $config);
        $earrings   = Model_Tproduct::getProductsByName($pagination, Input::post('txt_search'), 6);

        $view                         = View::forge('products/earring/index');
        $view->earrings               = $earrings;
        $view->pagination             = $pagination;
        $this->template->title        = "Bông tai";
        $this->template->number_carts = count(Session::get('carts'));
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
    public function action_detail($id = null) {

        $view     = View::forge('products/earring/detail');
        $products = Model_Tproduct::getProducts($id);

        $this->template->title        = "Chi tiết sp";
        $this->template->number_carts = count(Session::get('carts'));
        $view->products               = $products;
        $this->template->content      = $view;
    }

    /**
     *
     * @param type $id
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

        Response::redirect('products/earring/');
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
    public function action_edit($id = null) {

        $view                         = View::forge('earring/edit');
        $this->template->title        = "Laptop Edit"; //__('title.:label_edit_title', array('label' => __('common.position')));
        $this->template->number_carts = count(Session::get('carts'));
        $this->template->content      = $view;
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

        $total_items = Model_Tproduct::countProductsByName(Input::post('txt_search'), 1);
        $config      = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/products/earring/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Fuel\Core\Pagination::forge('products/laptop/', $config);

        $products = Model_Tproduct::getProductsByName($pagination, Input::post('txt_search'), 1);

        $view = View::forge('products/earring/index');

        $view->products          = $products;
        $view->pagination        = $pagination;
        $this->template->title   = "Bông tai";
        $this->template->content = $view;
    }

}
