<?php

namespace Application\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of User
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class User extends Model {

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';

    protected $table = 'user';

}
