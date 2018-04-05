<?php

namespace Application\Model;

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

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';

    protected $table = 'product';

    public function productStock() {
        return $this->hasOne(\Application\Model\Stock::class, 'id_product', 'id');
    }

    public function productPrice() {
        return $this->hasMany(\Application\Model\Price::class, 'id_product', 'id');
    }

}
