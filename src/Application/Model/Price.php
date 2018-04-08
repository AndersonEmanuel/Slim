<?php

namespace Application\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of Price
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Price extends Model {

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';

    protected $table = 'product_price';

    public function product() {
        return $this->hasOne(\Application\Model\Product::class, 'id', 'id_product');
    }

    public function paymentType() {
        return $this->hasOne(\Application\Model\PaymentType::class, 'id', 'id_payment_type');
    }

}
