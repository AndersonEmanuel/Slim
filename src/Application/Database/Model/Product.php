<?php

namespace Application\Database\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of Product
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Product extends Model {

    protected $table = 'product';

    public function productStock() {
        return $this->hasOne(\Application\Database\Model\Stock::class, 'id_product', 'id');
    }

    public function productPrice() {
        return $this->hasMany(\Application\Database\Model\Price::class, 'id_product', 'id');
    }

}
