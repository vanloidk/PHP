<?php

class Controller_Cart extends Controller_Base {

    /**
     * Show data index
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_index() {
        $view                  = View::forge('cart/index');
        $this->template->title = "Depdocla | giỏ hàng";

        //$this->createOrder();

        list(, $userId) = Auth::get_user_id();

        $carts    = Session::get('carts');
        $cart_dto = new Dto_Cart();
        $arr_cart = array();
        $i        = 0;
        if ($carts) {
            foreach ($carts as $key => $value) {
                $prod                   = Model_Tproduct::find($value->id);
                $cart_dto->product_id   = $value->id;
                $cart_dto->product_name = $prod->name;
                $cart_dto->total_price  = $prod->price;
                $cart_dto->total_items  = $value->total_items;
                $cart_dto->total_qty    = ($prod->price) * ($value->total_items);

                array_push($arr_cart, (array) $cart_dto);
                $i++;
            }
        }
        $view->carts = $arr_cart;

        $view->accountId         = $userId != null ? $userId : -1;
        $this->template->content = $view;
    }

    /**
     * delete product in carts
     *
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     */
    public function action_delete() {

        $carts   = Session::get('carts');
        $cartnew = array();

        foreach ($carts as $key => $value) {
            if ($value->id == input::post('cartId')) {
                unset($carts[$key]);
            } else {
                $cartnew[] = $carts[$key];
            }
        }
        Session::set('carts', $cartnew);
    }

}
