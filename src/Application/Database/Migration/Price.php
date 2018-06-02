<?php

namespace Application\Database\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Price
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Price extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'product_price';

    /**
     * Run the migrations.
     * @table product_price
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
            $table->integer('id_product');
            $table->integer('id_payment_type');
            $table->decimal('value', 20, 6)->default('0');

            $table->index(["id_product"], 'fk_product_price_product1_idx');

            $table->index(["id_payment_type"], 'fk_product_price_payment_type1_idx');


            $table->foreign('id_product', 'fk_product_price_product1_idx')
                    ->references('id')->on('product')
                    ->onDelete('no action')
                    ->onUpdate('no action');

            $table->foreign('id_payment_type', 'fk_product_price_payment_type1_idx')
                    ->references('id')->on('payment_type')
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
