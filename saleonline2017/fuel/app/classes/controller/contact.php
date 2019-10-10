<?php

class Controller_contact extends Controller_Base {

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
     * contact index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_index() {

        $view      = View::forge('account/contact');
        $view->err = array();

        if (Input::method() == "POST") {
            $val = Model_Contact::validate_send_contact();
            if ($val->run()) {
                $contact               = new Model_Contact();
                $contact->name         = Input::post("username");
                $contact->last_name    = Input::post("last_name");
                $contact->email        = Input::post("email");
                $contact->organization = Input::post("oganization");
                $contact->phone        = Input::post("mobile");
                $contact->reason       = Input::post("reason");
                $contact->common       = Input::post("help");
                $contact->created_date = date("Y/m/d");

                if ($contact->save()) {
                    Session::set_flash('success', "Gửi thông tin liên hệ thành công");
                } else {
                    Session::set_flash('error', "Gửi thông tin liên hệ không thành công");
                }
            } else {
                Session::set_flash('error', "Gửi thông tin liên hệ không thành công");
                $view->err = $val->error_message();
            }
        }

        $this->template->title   = "Contact us";
        $this->template->content = $view;
    }

    /**
     * Register contact
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_add() {

        // Response::redirect("contact/");
    }

    /**
     * delete contact
     *
     * @param int $id Account id
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_delete() {
        $contact = Model_Contact::find(input::post('contactId'));
        $contact->delete();
    }

    /**
     * Register contact
     *
     * @param int $id Account id
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_list() {

        $view                    = View::forge('contact/index');
        $contacts                = Model_Contact::find("all");
        $view->contacts          = $contacts;
        $this->template->title   = "Danh sách thành viên";
        $this->template->content = $view;
    }

    public function action_edit($id = null) {

        $view    = View::forge('contact/edit');
        $contact = Model_Contact::find($id);

        if (Input::method() == "POST") {
            $contact->name         = Input::post('user_name');
            $contact->email        = Input::post('email');
            $contact->organization = Input::post('organization');
            $contact->phone        = Input::post('mobile');
            $contact->reason       = Input::post('reason');
            $contact->common       = Input::post('common');
            if ($contact->save()) {
                Session::set_flash('success', "Sữa thông tin liên hệ thành công");
            } else {
                Session::set_flash('error', "Sữa thông tin liên hệ không thành công");
            }
        }

        $view->contact           = $contact;
        $this->template->title   = "Sữa thông tin liên hệ";
        $this->template->content = $view;
    }

}
