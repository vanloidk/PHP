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
class Controller_Products_Shoe extends Controller_Base {

    /**
     * Index Shoe
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {


        $total_items = Model_Tproduct::countProductsPagination(2);

        $config     = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/products/shoe/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );
        $pagination = Fuel\Core\Pagination::forge('products/shoe/', $config);

        $view     = View::forge('products/shoe/index');
        //$tproduct = Model_Tproduct::find('all');
        $tproduct = Model_Tproduct::getProductsPagination($pagination, 2);

        $view->tproduct = $tproduct;

        $view->pagination             = $pagination;
        $this->template->title        = "Shoe";
        $this->template->number_carts = count(Session::get('carts'));
        $this->template->content      = $view;
    }

    /**
     * Index shoe
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_detail($id = null) {
        $view = View::forge('products/shoe/detail');

        $entity_pro = Model_Tproduct::find($id);

        $this->template->title        = "shoe details";
        $this->template->number_carts = count(Session::get('carts'));
        $view->entity_prod            = $entity_pro;
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

        Response::redirect('products/shoe/');
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

        $view                         = View::forge('shoe/edit');
        $this->template->title        = "Shoe Edit"; //__('title.:label_edit_title', array('label' => __('common.position')));
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

        $total_items = Model_Tproduct::countProductsByName(Input::post('txt_search'), 2);

        $config = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/products/shoe/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Pagination::forge('products/shoe/index/', $config);
        $product    = Model_Tproduct::getProductsByName($pagination, Input::post('txt_search'), 2);

        $view = View::forge('products/shoe/index');

        $view->tproduct          = $product;
        $view->pagination        = $pagination;
        $this->template->title   = "Shoe";
        $this->template->content = $view;
    }

}
