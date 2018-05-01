<?php

namespace Application\Database\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of Stock
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Stock extends Model {

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';

    protected $table = 'product_stock';

}
