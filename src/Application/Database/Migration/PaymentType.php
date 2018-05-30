<?php

namespace Application\Database\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of PaymentType
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class PaymentType extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'payment_type';

    /**
     * Run the migrations.
     * @table payment_type
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
            $table->string('name', 50);
            $table->text('description');
            $table->boolean('allows_discount')->default('0');
            $table->boolean('allows_installment')->default('0');
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
