<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sort".
 *
 * @property integer $id
 * @property string $name
 */
class Sort
{
    $order_p = array(
        'pricea' => array('от дешевых к дорогим', 'price ASC'),
        'priced' => array('от дорогих к дешевым', 'price DESC'),
        'namea' => array('от А до Я', 'name ASC'),
        'named' => array('от Я до А', 'name DESC')
    )
    function sortTrue($_GET['order']){
    
    }
}


