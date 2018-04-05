<?php

namespace Application\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of PaymentType
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class PaymentType extends Model {

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';

    protected $table = 'payment_type';

}
