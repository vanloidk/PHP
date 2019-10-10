#!/usr/bin/php
<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 'off');
abstract class AAA
{

    public function getValueAAA($value)
    {
        if ($value) {
            return 8;
        } else {
            return -1;
        }
    }

}

class BBB extends AAA
{

    public function getValueBBB($value)
    {
        if ($value) {
            return 8;
        } else {
            return -1;
        }
    }

//    public function getValueAAA($value)
//    {
//        return 50;
//    }
}

class CCC extends AAA
{

}

$bb = new BBB();

$result1 = $bb->getValueAAA(FALSE);

$cc = new CCC();

$result2 = $cc->getValueAAA(FALSE);

var_dump($result1);
var_dump($result2);
