<?php

namespace Application\Database\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of SaleProduct
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class SaleProduct extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'sale_product';

    /**
     * Run the migrations.
     * @table sale_product
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
            $table->integer('id_sale');
            $table->integer('id_product');
            $table->decimal('value', 11, 6)->default('0');
            $table->decimal('amount', 11, 6)->default('0');
            $table->decimal('subtotal', 11, 6)->default('0');

            $table->index(["id_sale"], 'fk_sale_product_sale_idx');
            $table->index(["id_product"], 'fk_sale_product_product1_idx');

            $table->foreign('id_sale', 'fk_sale_product_sale_idx')
                    ->references('id')->on('sale')
                    ->onDelete('no action')
                    ->onUpdate('no action');
            $table->foreign('id_product', 'fk_sale_product_product1_idx')
                    ->references('id')->on('product')
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
