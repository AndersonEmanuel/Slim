<?php

namespace Application\Database\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Provider
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Provider extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'provider';

    /**
     * Run the migrations.
     * @table provider
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
            $table->string('email', 50);
            $table->string('phone', 20);
            $table->string('postal_code', 10);
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
