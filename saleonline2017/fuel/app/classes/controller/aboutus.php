<?php

class Controller_Aboutus extends Controller_Base {

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
    public function action_index() {

        $view                    = View::forge('account/aboutus');
        $this->template->title   = "About us";
        $this->template->content = $view;
    }

}
