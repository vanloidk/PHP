<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\View;
use Fuel\Core\Lang;
use Fuel\Core\Asset;
use Auth\Auth;

class Controller_Base extends Controller_Template {

    //public $template = 'template_user';
    public $user_id;
    public $controller = "";
    public $action     = "";

    /**
     * Run before display a page
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function before() {
        $this->check_permission();
        // load language file
        $user = Model_Account::find(Auth::get('id'));

        $lang     = DEFAULT_LANG;
        Config::set('language', $lang);
        $arr_lang = Lang::load('language.ini');

        //set template for user
        if (Session::get('login_port') == "admin") {

            $this->template = 'template_admin';
        } elseif (Session::get('login_port') == "sale") {
            $this->template = 'template_sale';
        } else {
            $this->template = 'template_user';
        }

        $tg      = time();
        $tgout   = 900;
        $newTime = $tg - $tgout;

        //delete user offline
        Model_UserOnline::delete_userOffline($newTime);
        //insert user online
        $this->addUserOnline();

        //user online
        $userOnlines = Model_UserOnline::get_useronline();
        //var_dump($userOnlines); exit();
        //before
        parent::before();

        // load base css
        $this->baseCss();
        // load base js
        $this->baseJs();

        //asign language to template
        $this->template->set('number_carts', count(Session::get('carts')));
        $this->template->set('controller', $this->controller);
        $this->template->set('action', $this->action);
        $this->template->set('language', json_encode($arr_lang['javascript']), false);
        $this->template->set('user', $user);
        $this->template->set('user_online', count($userOnlines));
    }

    /**
     * display error 404 not page found
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function action_404() {
        return View::forge('layout/404');
    }

    /**
     * display access denied page
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function action_error() {
        Session::set_flash('error', __('message.access_denied'));
    }

    /**
     * Action logout
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Ngyen Van Loi
     */
    public function action_logout() {

        Auth::logout();
        $login_port = Session::get('login_port');
        //var_dump($login_port);
        //exit();
        if ($login_port != USER_PORT) {

            Session::delete('login_port');
            Session::destroy();
            Response::redirect("/account/{$login_port}/login");
        } else {
            // exit();
            Session::delete('login_port');
            Session::destroy();
            Session::set('login_port', VISITOR_PORT);

            Response::redirect("/sanpham");
            // Response::redirect("account/visitor/");
        }
        exit();
    }

    /**
     * Action logout
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Ngyen Van Loi
     */
    public function action_change_password() {
        $view      = View::forge('common/change_password');
        $view->err = array();

        if (Input::method() == 'POST') {
            $val = Model_Account::validate_change_password();
            if ($val->run()) {

                //change password
                if (Auth::change_password(Input::post('old_password'), Input::post('new_password'), Auth::get('username'))) {
                    Session::set_flash('success', "Thay đổi mật khẩu thành công"); //__('message.password_changed'));
                } else {
                    Session::set_flash('error', "Thay đổi mật khẩu không thành công"); //__('message.registration_failed'));
                }
            } else { //validate error
                Session::set_flash('error', "Thay đổi mật khẩu không thành công"); //__('message.password_changed_unsuccessfully'));
                $view->err = $val->error_message();
            }
        }
        $this->template->title   = "Depdocla | Thay đổi mật khẩu"; //__('common.change_password');
        $this->template->content = $view;
    }

    /**
     * load base css
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function baseCss() {
        $this->addCss('saleonline.css');
        $this->addCss('bootstrap.min.css');
        $this->addCss('calendar.css');
        $this->addCss('delivery.css');
        $this->addCss('datepicker.css');

        $this->addCss('bootstrap-datetimepicker.min.css');
        $this->addCss('style.css');
        $this->addCss('jquery-ui.css');
        $this->addCss('bootstrap.css');
        $this->addCss('owl.carousel.min.css');
        $this->addCss('icomoon.css');
        $this->addCss('owl.theme.default.min.css');
        
        $this->addCss('ui.totop.css');

        // $this->addCss('ckeditor/contents.css');
        //$this->addCss('font-awesome.css');
        //$this->addCss('font-awesome.min.css');
    }

    /**
     * load base js
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function baseJs() {
        //$this->addJs('jquery-ui.js');
        // $this->addJs('jquery-1.10.2.js');
        //$this->addJs('jquery.tablesorter.widgets.min.js');
        //$this->addJs('jquery.tablesorter.min.js');

        $this->addJs('jquery-1.11.3.min.js');
        $this->addJs('jquery-ui.min.js');
        $this->addJs('bootstrap.min.js');
        $this->addJs('moment.js');
        $this->addJs('underscore-min.js');
        $this->addJs('datepicker.js');
        $this->addJs('bootstrap-datetimepicker.min.js');
        $this->addJs('bootstrap-datepicker.ja.js');
        //$this->addJs('bootstrap-datetimepicker.ja.js');
        $this->addJs('calendar.js');
        $this->addJs('calendar-ja-JP.js');
        $this->addJs('jquery.blockUI.js');
        $this->addJs('function.js');
        $this->addJs('admin.js');
        $this->addJs('user.js');
        $this->addJs('menutop.js');
        //  $this->addJs('ckeditor/ckeditor.js');
        //  $this->addJs('ckeditor/config.js');
        // $this->addJs('ckeditor/styles.js');

        $this->addJs('bootstrap-rating-input.min.js');
        $this->addJs('mainCarousel.js');
        $this->addJs('owl.carousel.min.js');
        $this->addJs('jquery.waypoints.min.js');
     
        $this->addJs('jquery.ui.totop.js');
        $this->addJs('easing.js');


        //$this->addJs('jssor.slider.mini.js');
        //$this->addJs('jssor.slider.min.js');
        //$this->addJs('bootstrap.js');
        // $this->addJs('bootstrap-datepicker.js');
    }

    /**
     * add more neccessary css file to use
     *
     * @param string $file name of css file
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function addCss($file) {
        Asset::css($file, array(), 'css', false);
    }

    /**
     * add more neccessary js file to use
     *
     * @param string $file name of js file
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public function addJs($file) {
        Asset::js($file, array(), 'js', false);
    }

    /**
     * check permission
     *
     * @return mix
     *
     * @access public
     * @author Ngyen Van Loi
     */
    protected function check_permission() {
        //get controller name and action name
        //check user lock
        //get login port
        $area = Session::get('login_port');

        $this->controller = strtolower(substr(Request::active()->controller, 11));
        $this->action     = Request::active()->action;

        //allow login and error page
        if (Session::get('login_port') != VISITOR_PORT) {
            $this->action = Request::active()->action;
        } else {
            $this->action = "index";
        }

        if ($this->action == 'login' || $this->action == 'error') {
            return true;
        }


        // set user id to property
        //  $this->user_id = $account->id;
        //var_dump($action); exit();
        // exit();
        //check login
        //  exit("aaaa");
        // var_dump(Auth::get('id'));
        //check user lock

        $account = Model_Account::find(Auth::get('id'));

        if (!Auth::check() && $area != VISITOR_PORT) {

            if (Input::is_ajax()) {
                echo 'not_logged_in';
                exit();
            }
            Response::redirect("account/login");
            exit();
        }

        if ($account != NULL) {
            if ($account->lock) {
                Auth::logout();
                //Response::redirect("account/user/login");
                Response::redirect("account/user");
                exit();
            }
        }

        if ($area == VISITOR_PORT) {
            $this->action = "index";
        } else {
            $this->action = Request::active()->action;
        }
        //access base controller
        if ($this->controller == 'base') {
            $area = COMMON_AREA;
        }

//        echo "<div>";
//        echo "<pre>";
//        var_dump($area);
//        var_dump($controller);
//        var_dump($action);
//        echo "</pre>";
//        echo "</div>";
//        exit();
        //   exit();
        //check role of user
//        if (!$accoutnIds) {
//            foreach ($accoutnIds as $id) {
//                switch ($id) {
//                    case 1:
//                        $area = ADMIN_PORT;
//                        break;
//                    case 2:
//                        $area = SALE_PORT;
//                        break;
//                    case 3:
//                        $area = USER_PORT;
//                        break;
//                    default :
//                        $area = COMMON_AREA;
//                        break;
//                }
//            }
//        }

        if ($account != NULL) {

            if (!Auth::has_access("{$area}.{$this->controller}[{$this->action}]")) {
                Response::redirect("/base/error");
                exit();
            }
        }
    }

    public function getCity() {
        $city = array("Select", "Tp. Hồ Chí Minh", "Other"
        );
        return $city;
    }

    public function getDistrict($numStrict) {
        switch ($numStrict) {
            case 1:
                $strict = array("Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5",
                    "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10", "Quận 11",
                    "Quận 12", "Gò Vấp", "Tân Bình", "Tân Phú", "Bình Thạnh", "Phú Nhuận", "Bình Tân",
                    "Thủ Đức", "Bình Chánh", "Cần Giờ", "Nhà Bè", "Hooc Môn", "Củ Chi"
                );
                break;

            default:
                $strict = array();
                break;
        }

        return $strict;
    }

    public function addUserOnline() {

        $userOnline              = new Model_UserOnline();
        $userOnline->ip          = $_SERVER['REMOTE_ADDR'];
        $userOnline->sessionId   = Cookie::get("PHPSESSID");
        $userOnline->path_access = $_SERVER['PHP_SELF'];
        $userOnline->time_temp   = time();
        $userOnline->save();
    }

}
