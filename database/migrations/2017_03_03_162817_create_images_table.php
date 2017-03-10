<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        DB::statement('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
        DB::statement('SET time_zone = "+00:00";');

        Schema::create('images', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->char('image_id',32)->comment('图片ID');
            $table->string('storage',50)->default('filesystem')->comment('存储引擎');
            $table->string('image_name',50)->nullable()->comment('图片名称');
            $table->string('ident',200);
            $table->string('url',200)->comment('网址');
            $table->string('l_ident',200)->nullable()->comment('大图唯一标识');
            $table->string('l_url',200)->nullable()->comment('大图URL地址');
            $table->string('m_ident',200)->nullable()->comment('中图唯一标识');
            $table->string('m_url',200)->nullable()->comment('中图URL地址');
            $table->string('s_ident',200)->nullable()->comment('小图唯一标识');
            $table->string('s_url',200)->nullable()->comment('小图URL地址');
            $table->unsignedMediumInteger('width')->nullable ()->comment('宽度');
            $table->unsignedMediumInteger('height')->nullable()->comment('高度');
            $table->enum('watermark',[1,0])->default(0)->comment('有无水印');
            $table->unsignedInteger('last_modified')->default(0)->comment('更新时间');
            $table->primary('image_id');
        });
        DB::statement('alter table images add index images_keys (image_id,url(20),s_url(20),m_url(20),l_url(20),last_modified,width,height); ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('images');
    }
}
