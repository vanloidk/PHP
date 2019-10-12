<?php

return array(
    '_root_' => 'account/visitor/',
    
    'sale/login'   => 'account/sale/login',
    'admin/login'  => 'account/admin/login',
    'account/register' => 'account/user/register/',
    'account/login'  =>  'account/user/login/',
    
    'sanpham' => 'product/',
    'sanpham/dongho' => 'products/clock/',
    'sanpham/nhan' => 'products/ring/',
    'sanpham/bongtai' => 'products/earring/',
    'sanpham/daychuyen' => 'products/necklace/',
    'sanpham/lactaylacchan' => 'products/bangle/',
    'sanpham/hoptrangsuc' => 'products/jewelrybox/',
    'sanpham/balo' => 'products/backpack/',
    'sanpham/tuixach' => 'products/handbag/',
    'sanpham/donghogiamgia' => 'products/clockSaleOff/',
    'sanpham/nhangiamgia' => 'products/ringSaleOff/',
    'sanpham/bongtaigiamgia' => 'products/earringSaleOff/',
    'sanpham/vongcogiamgia' => 'products/necklaceSaleOff/',
    'sanpham/lactaylacchangiamgia' => 'products/bangleSaleOff/',
    'sanpham/hoptrangsucgiamgia' => 'products/jewelrySaleOff/',
    
    'sanpham/dongho/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/nhan/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/bongtai/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/daychuyen/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/lactaylacchan/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/hoptrangsuc/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/balo/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/tuixach/(:any)-(:num)' => 'product/detail/$2',
    
    'sanpham/donghogiamgia/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/nhangiamgia/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/bongtaigiamgia/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/vongcogiamgia/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/lactaylacchangiamgia/(:any)-(:num)' => 'product/detail/$2',
    'sanpham/hoptrangsucgiamgia/(:any)-(:num)' => 'product/detail/$2',
    
    'tintuc' => 'news/',
    'tintuc/(:any)-(:num)' => 'news/detail/$2',
    'lienhe' => 'contact/'
    
   
    
);
