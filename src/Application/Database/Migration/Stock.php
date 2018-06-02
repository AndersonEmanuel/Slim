<?php

namespace Application\Database\Migration;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 
 * Description of Stock
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Stock extends Migration {

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'product_stock';

    /**
     * Run the migrations.
     * @table product_stock
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
            $table->decimal('available_quantity', 20, 6)->default('0');
            $table->decimal('reserved_quantity', 20, 6)->default('0');

            $table->index(["id_product"], 'fk_product_stock_product1_idx');

            $table->unique(["id_product"], 'id_product_unique');

            $table->foreign('id_product', 'fk_product_stock_product1_idx')
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
