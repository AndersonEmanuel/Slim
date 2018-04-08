<?php

namespace Application\Model;

use \Illuminate\Database\Eloquent\Model;

/**
 * 
 * Description of Category
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Category extends Model {

    const CREATED_AT = 'insertion_date';
    const UPDATED_AT = 'edition_date';
    
    protected $table = 'category';

}
