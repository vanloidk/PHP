<?php

class Controller_policy extends Controller_Base {

    /**
     * before contact
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function before() {
        parent::before();
    }

    /**
     * about us index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_genuineProduct() {

        $view                    = View::forge('policy/genuineProduct');
        $this->template->title   = "Sản phẩm chính hảng";
        $this->template->content = $view;
    }

    /**
     * about us index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_hotline() {

        $view                    = View::forge('policy/hotline');
        $this->template->title   = "Hotline";
        $this->template->content = $view;
    }

    /**
     * about us index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_nationwide() {

        $view                    = View::forge('policy/nationwide');
        $this->template->title   = "Giao hàng toàn quốc";
        $this->template->content = $view;
    }

}
