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
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
class Controller_Sale_Product extends Controller_Base {

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index() {

        $view     = View::forge('account/sale/product/index');
        $category = Model_Tcategory::get_categoryName();
        //submit search
        if (Input::method() == 'POST') {

            $total_items = Model_Tproduct::countProductsByName(Input::post('nameProduct'), Input::post('category'));
            $config      = array(
                'name'           => 'bootstrap3',
                'show_first'     => true,
                'show_last'      => true,
                'first-marker'   => 'First',
                'last-marker'    => 'Last',
                'pagination_url' => 'http://localhost:8080/saleonline/html/sale/product/',
                'total_items'    => $total_items,
                'per_page'       => 50,
                // or if you prefer pagination by query string
                'uri_segment'    => 'page',
            );
            $pagination  = Pagination::forge('sale/product/', $config);
            $tproduct    = Model_Tproduct::getProductsByName($pagination, Input::post('nameProduct'), Input::post('category'));
        } else {


            $total_items = Model_Tproduct::countProducts();
            $config      = array(
                'name'           => 'bootstrap3',
                'show_first'     => true,
                'show_last'      => true,
                'first-marker'   => 'First',
                'last-marker'    => 'Last',
                'pagination_url' => 'http://localhost:8080/saleonline/html/sale/product/',
                'total_items'    => $total_items,
                'per_page'       => 50,
                // or if you prefer pagination by query string
                'uri_segment'    => 'page',
            );

            $pagination = Fuel\Core\Pagination::forge('sale/product/', $config);
            $tproduct   = Model_Tproduct::getProductsPaginationHome($pagination);
        }

        // $view     = View::forge('account/sale/product/index');
        //$products = Model_Tproduct::find('all', array('order_by' => 'category_id'));

        $view->tproduct               = $tproduct;
        $view->pagination             = $pagination;
        $view->category               = $category;
        $this->template->title        = "Sản phẩm";
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
        $view = View::forge('account/sale/product/detail');

        $entity_pro = Model_Tproduct::find($id);

        $this->template->title        = "Laptop details";
        $this->template->number_carts = count(Session::get('carts'));
        $view->entity_prod            = $entity_pro;
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
    public function action_edit($id = null) {

        $view     = View::forge('account/sale/product/edit');
        $category = Model_Tcategory::get_categoryName();

        $productEdit = Model_Tproduct::getProducts($id);

        if (Input::method() == "POST") {

            $product = Model_Tproduct::getProducts(Input::post("id"));

            $product->name          = Input::post('nameP');
            $product->serial_number = Input::post('serial_number');
            if ($_FILES["file"]["name"] != "") {
                $product->img = $_FILES["file"]["name"];
            }
            $product->price       = Input::post('price');
            $product->saleoff     = Input::post('saleoff');
            $product->quantity    = Input::post('quantity');
            $product->status      = !empty(Input::post('status')) ? 1 : 0;
            $product->category_id = Input::post('category');

            $product->updated_date = date("Y-m-d");
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
            } else { //insert tproductdtl
                $productdtl               = new Model_Tproductdtl();
                $productdtl->product_id   = $product->id;
                $productdtl->img          = Input::post("detail");
                $productdtl->name         = "test";
                $productdtl->model        = "AAA";
                $productdtl->price        = "test";
                $productdtl->created_date = date("Y-m-d");
                $productdtl->updated_date = date("Y-m-d");
                $productdtl->save();
            }

            Session::set_flash('success', "Insert succeed");
            Response::redirect("sale/product/index/");
        }

        $view->category          = $category;
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


        $view = View::forge('account/sale/product/new');

        //get category

        $category = Model_Tcategory::get_categoryName();

        if (Input::method() == "POST") {

            //save product and product dtl
            $procduct                = new Model_Tproduct();
            $procductdtl             = new Model_Tproductdtl();
            $procduct->name          = Input::post('nameP');
            $procduct->serial_number = Input::post('serial_number');
            $procduct->img           = $_FILES["file"]["name"];
            $procduct->price         = Input::post('price');
            $procduct->saleoff       = Input::post('saleoff');
            $procduct->quantity      = Input::post('quantity');
            $procduct->status        = !empty(Input::post('status')) ? 1 : 0;

            $procduct->category_id  = Input::post('category');
            $procduct->created_date = date("Y-m-d");
            $procduct->updated_date = date("Y-m-d");


            $procduct->save();

            $procductdtl->product_id   = $procduct->id;
            $procductdtl->img          = Input::post("detail");
            $procductdtl->name         = "nameTest";
            $procductdtl->model        = "modelTest";
            $procductdtl->price        = "priceTest";
            $procductdtl->created_date = date("Y-m-d");
            $procductdtl->updated_date = date("Y-m-d");

            $procductdtl->save();

            Session::set_flash('success', "Insert succeed");
            Response::redirect('sale/laptop/?sp=Laptop');
        }

        $view->category = $category;

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
