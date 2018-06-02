<?php

namespace Application\Database\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Log
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Log extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'log';

    /**
     * Run the migrations.
     * @table log
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
            $table->text('description');
            $table->string('source', 100);
            $table->dateTime('create_at')->default('NOW()');
            $table->dateTime('update_at')->default('NOW()');
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
