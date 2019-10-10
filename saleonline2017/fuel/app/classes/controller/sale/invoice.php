<?php

/**
 * /position.php
 *
 * @copyright Copyright (C) X-TRANS inc.
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
/**
 * Position
 *
 * <pre>lnet
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
class Controller_Sale_Invoice extends Controller_Base
{

        /**
         * Index Shift Position
         *
         * @access public
         * @author Nguyen Van Loi
         * @version 1.0
         * @since 1.0
         */
        public function action_index()
        {

                $view     = View::forge('account/sale/invoice/index');
                $tproduct = Model_Tproduct::find('all');

                $view->tproduct = $tproduct;

                $this->template->title        = "Invoice";
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
        public function action_detail($id = null)
        {
                $view = View::forge('account/sale/laptop/detail');

                $entity_pro = Model_Tproduct::find($id);

                $this->template->title        = "Laptop details";
                $this->template->number_carts = count(Session::get('carts'));
                $view->entity_prod            = $entity_pro;
                $this->template->content      = $view;
        }

        /**
         *
         * @param type $id
         */
        public function action_cart($id = null)
        {
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

                Response::redirect('products/laptop/');
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
        public function action_edit($id = null)
        {

                $view                         = View::forge('position/edit');
                $this->template->title        = __('title.:label_edit_title', array('label' => __('common.position')));
                $this->template->number_carts = count(Session::get('carts'));
                $this->template->content      = $view;
        }

}
