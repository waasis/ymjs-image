<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('images')->insert([
            'image_id' => '000117ade10eed8a3640b44a22de45ae',
            'storage' => 'filesystem',
            'image_name' => 'product-224.jpg',
            'ident' => '/dd/6f/a8/3b64f08b8ffd0d91bcc34ad946f6d8972d2c435a.jpg',
            'url' => 'public/images/dd/6f/a8/3b64f08b8ffd0d91bcc34ad946f6d8972d2c435a.jpg',
            'l_ident' => '/2b/93/18/1e822e4dabd72328af949c7f8de4144b38296b44.jpg',
            'l_url' => 'public/images/2b/93/18/1e822e4dabd72328af949c7f8de4144b38296b44.jpg',
            'm_ident' => '/f5/5b/c0/c342e554895cf5983c744691a7cc6da1c61e0950.jpg',
            'm_url' => 'public/images/f5/5b/c0/c342e554895cf5983c744691a7cc6da1c61e0950.jpg',
            's_ident' => '/8d/93/c4/30bd17d4f0b91c5286eebbc6f4996610688af861.jpg',
            's_url' => 'public/images/8d/93/c4/30bd17d4f0b91c5286eebbc6f4996610688af861.jpg',
            'width' =>  1204,
            'height' =>  800,
            'watermark' => 1,
            'last_modified' =>1442456037
        ]);
    }
}
