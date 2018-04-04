<?php

namespace Application\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of Sale
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Sale extends Model {

    protected $table = 'sale';

    public function customer() {
        return $this->hasOne(\Application\Model\Customer::class, 'id', 'id_customer');
    }

    public function paymentType() {
        return $this->hasOne(\Application\Model\PaymentType::class, 'id', 'id_payment_type');
    }

    public function user() {
        return $this->hasOne(\Application\Model\User::class, 'id', 'id_user');
    }

    public function saleProduct() {
        return $this->hasMany(\Application\Model\SaleProduct::class, 'id_sale', 'id');
    }

}
