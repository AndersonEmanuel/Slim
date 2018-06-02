<?php

namespace Application\Database\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Sale
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Sale extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'sale';

    /**
     * Run the migrations.
     * @table sale
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
            $table->integer('id_customer');
            $table->integer('id_payment_type');
            $table->integer('id_user');
            $table->dateTime('date')->default('NOW()');
            $table->decimal('subtotal', 11, 6)->default('0');
            $table->decimal('discount', 11, 6)->default('0');
            $table->decimal('total', 11, 6)->default('0');

            $table->index(["id_user"], 'fk_sale_user1_idx');
            $table->index(["id_customer"], 'fk_sale_customer1_idx');
            $table->index(["id_payment_type"], 'fk_sale_payment_type1_idx');


            $table->foreign('id_customer', 'fk_sale_customer1_idx')
                    ->references('id')->on('customer')
                    ->onDelete('no action')
                    ->onUpdate('no action');
            $table->foreign('id_payment_type', 'fk_sale_payment_type1_idx')
                    ->references('id')->on('payment_type')
                    ->onDelete('no action')
                    ->onUpdate('no action');
            $table->foreign('id_user', 'fk_sale_user1_idx')
                    ->references('id')->on('user')
                    ->onDelete('no action')
                    ->onUpdate('no action');
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
