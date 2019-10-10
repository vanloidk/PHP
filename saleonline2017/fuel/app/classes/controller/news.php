<?php

class Controller_news extends Controller_Base {

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
     * news index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_index() {

        $total_items = Model_Tnews::countNewsPagination();
        $config      = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/news/',
            'total_items'    => $total_items,
            'per_page'       => 10,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Fuel\Core\Pagination::forge('news/', $config);
        $news       = Model_Tnews::getNews($pagination, "");

        $view                  = View::forge('news/index');
        $view->news            = $news;
        $view->pagination      = $pagination;
        $this->template->title = "Tin tức";

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

        $view = View::forge('news/detail');

        $new = Model_Tnews::find($id);

        $this->template->title   = "Tin tức chi tiết";
        $view->new               = $new;
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
