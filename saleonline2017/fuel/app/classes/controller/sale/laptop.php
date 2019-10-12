<?php

/**
 * /position.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
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
 * @license X-TRANS Develop License 1.0
 */
class Controller_Sale_Laptop extends Controller_Base {

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {
        $view = View::forge('account/sale/laptop/index');

        $products = Model_Tcategory::get_product_by_category(Input::get('sp'));
//        $aa       = $products[1];
//        echo "<pre>";
//
//        var_dump($aa->tproduct);
//        echo "</pre>";
//        exit();

        $view->tproduct = $products;

        $this->template->title        = "Laptop";
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

        Response::redirect('products/laptop/');
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
    public function action_edit($id = null) {

        $view = View::forge('account/sale/laptop/edit');

        $productEdit = Model_Tproduct::getProducts($id);

        if (Input::method() == "POST") {

            $product = Model_Tproduct::getProducts(Input::post("id"));

            $procduct->name          = Input::post('nameP');
            $procduct->serial_number = Input::post('serial_number');
            if ($_FILES["file"]["name"] != "") {
                $product->img = $_FILES["file"]["name"];
            }
            $procduct->price        = Input::post('price');
            $procduct->quantity     = Input::post('quantity');
            $procduct->status       = 1;
            $procduct->updated_date = date("Y-m-d");
            $product->save();

            //update product detail
            if ($product->tproductdtl) {
                $productdtls = $product->tproductdtl;
                foreach ($productdtls as $productdtl) {
                    $productdtl->img          = Input::post("detail");
                    $productdtl->name         = "test";
                    $productdtl->model        = "AAA";
                    $productdtl->price        = "test";
                    $productdtl->created_date = date("Y-m-d");
                    $productdtl->updated_date = date("Y-m-d");
                    $productdtl->save();
                }
            }
            //$productdtl = Model_Tproductdtl:: query()->select(array('product_id' => input::post('$id')));

            Session::set_flash('success', "Insert succeed");
            Response::redirect("sale/laptop/?sp=Laptop");
        }

        $view->product           = $productEdit;
        $this->template->title   = "Edit";
        $this->template->content = $view;
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
    public function action_delete() {
        //delete product
        $procduct = Model_Tproduct::find(input::post('laptopId'));
        $procduct->delete();

        //delete productdlt
        $procductdtl = Model_Tproductdtl::query()->select(array('product_id' => input::post('laptopId')));
        $procductdtl->delete();
    }

    /**
     * New products
     *
     * @param int $id product
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     */
    public function action_new() {


        $view = View::forge('account/sale/laptop/new');

        if (Input::method() == "POST") {

            //save product and product dtl
            $procduct                = new Model_Tproduct();
            $procductdtl             = new Model_Tproductdtl();
            $procduct->name          = Input::post('nameP');
            $procduct->serial_number = Input::post('serial_number');
            $procduct->img           = $_FILES["file"]["name"];
            $procduct->price         = Input::post('price');
            $procduct->quantity      = Input::post('quantity');
            $procduct->status        = 1;
            $procduct->category_id   = 1;
            $procduct->created_date  = date("Y-m-d");
            $procduct->updated_date  = date("Y-m-d");


            $procduct->save();

            $procductdtl->product_id   = $procduct->id;
            $procductdtl->img          = Input::post("detail");
            $procductdtl->name         = "test";
            $procductdtl->model        = "AAA";
            $procductdtl->price        = "test";
            $procductdtl->created_date = date("Y-m-d");
            $procductdtl->updated_date = date("Y-m-d");

            $procductdtl->save();

            Session::set_flash('success', "Insert succeed");
            Response::redirect('sale/laptop/?sp=Laptop');
        }

        //$view->product           = $procduct;
        $this->template->title   = "New";
        $this->template->content = $view;
    }

    /**
     * Upload file
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     */
    public function action_upload() {

        $target_dir  = "C:/xampp/htdocs/saleonline/html/assets/img/";
        //$target_file = $target_dir . "ok88.png";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        //var_dump($target_file); exit();
        //return;
        $uploadOk      = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //    echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            //     echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            //    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //    echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                //   echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            } else {
                //  echo "Sorry, there was an error uploading your file.";
            }
        }
        return basename($_FILES["file"]["name"]);
    }

}
