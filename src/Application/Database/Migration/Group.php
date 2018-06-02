<?php

namespace Application\Database\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Group
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Group extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'group';

    /**
     * Run the migrations.
     * @table group
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
            $table->dateTime('create_at')->default('NOW()');
            $table->dateTime('update_at')->default('NOW()');
            $table->dateTime('delete_at')->nullable();
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
