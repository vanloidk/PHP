<?php

class Model_Torder extends \Orm\Model {

    protected static $_table_name  = 't_order';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'account_id',
        'name',
        'ship_id',
        'purch_id',
        'invoice_no',
        'quantity',
        'account_id',
        'store_id',
        'language_id',
        'currency_id',
        'status',
        'comment',
        'order_type',
        'sale_note',
        'total',
        'created_date',
        'updated_date',
    );

    /**
     * relation mstrequestapprovalroute table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Loi
     */
    protected static $_has_many   = array(
        'order_product' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Torderproduct',
            'key_to'         => 'order_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'order_dtl'     => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Torderdtl',
            'key_to'         => 'order_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
    );
    protected static $_belongs_to = array(
        'account' => array(
            'key_from'       => 'account_id',
            'model_to'       => 'Model_Account',
            'key_to'         => 'id',
            'cascade_save'   => false,
            'cascade_delete' => false
        )
    );

    public static function searchOrder($order_id, $customer) {
        $query = Model_Torder::query()
                ->related('account');

        if ($order_id != null) {
            $query->where('id', $order_id);
        }

        if ($customer != null) {
            $query->where('account.username', 'like', '%' . $customer . '%');
        }
        //if ($order_status != null) {
        //$query->where('status', $order_status);
        $query->where('status', 0);
        //}

        return $query->get();
    }

    public static function searchOrderAccepted($order_id, $customer, $order_status) {
        $query = Model_Torder::query();
        // ->related('account')
        if ($order_id != null) {
            $query->where('id', $order_id);
        }
        if ($customer != null) {
            $query->where('account_id', $customer);
        }
        if ($order_status != null) {
            $query->where('status', $order_status);
        } else {
            $query->where('status', 1);
        }

        return $query->get();
    }

    public static function searchOrderTrack($order_id, $customer, $order_status) {
        $query = Model_Torder::query();
        // ->related('account')
        if ($order_id != null) {
            $query->where('id', $order_id);
        }
        if ($customer != null) {
            $query->where('account_id', $customer);
        }
        if ($order_status != null) {
            $query->where('status', $order_status);
        } else {
            $query->where('status', 2);
        }

        return $query->get();
    }

    public static function searchOrderPayment($order_id, $customer, $order_status) {
        $query = Model_Torder::query();
        // ->related('account')
        if ($order_id != null) {
            $query->where('id', $order_id);
        }
        if ($customer != null) {
            $query->where('account_id', $customer);
        }
        if ($order_status != null) {
            $query->where('status', $order_status);
        } else {
            $query->where('status', 3);
        }

        return $query->get();
    }

    public static function searchOrderCancel($order_id, $customer, $order_status) {
        $query = Model_Torder::query();
        // ->related('account')
        if ($order_id != null) {
            $query->where('id', $order_id);
        }
        if ($customer != null) {
            $query->where('account_id', $customer);
        }
        if ($order_status != null) {
            $query->where('status', $order_status);
        } else {
            $query->where('status', -1);
        }

        return $query->get();
    }

    public static function getLstOrder() {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('status', '=', 0)
                ->get();
        return $lstOrder;
    }

    public static function getLstOrderAccepted() {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('status', '=', 1)
                ->get();
        return $lstOrder;
    }

    public static function getLstOrderTracking() {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('status', '=', 2)
                ->get();
        return $lstOrder;
    }

    public static function getLstOrderPayment() {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('status', '=', 3)
                ->get();
        return $lstOrder;
    }

    public static function getLstOrderCancel() {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('status', '=', -1)
                ->get();
        return $lstOrder;
    }

    public static function getOrderByOrderId($orderId) {
        $lstOrder = Model_Torder::query()
                ->related('account')
                ->related('order_dtl')
                ->where('id', $orderId)
                ->get_one();
        return $lstOrder;
    }

    public static function getMaxOrderId() {
        $maxId = Model_Torder::query()
                ->max('id');
        return $maxId ? $maxId : 0;
    }

}
