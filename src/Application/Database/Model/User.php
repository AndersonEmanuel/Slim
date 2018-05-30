<?php

namespace Application\Database\Model;

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

    /**
     *
     * @var string 
     */
    protected $table = 'user';

    /**
     *
     * @var array 
     */
    protected $hidden = ['password'];

}
