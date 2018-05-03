<?php

namespace Application\Database\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Category
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Category extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'category';

    /**
     * Run the migrations.
     * @table category
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->dateTime('insertion_date')->default('NOW()');
            $table->dateTime('edition_date')->nullable();
            $table->dateTime('deactivation_date')->nullable();
            $table->boolean('disabled')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists($this->set_schema_table);
    }

}
