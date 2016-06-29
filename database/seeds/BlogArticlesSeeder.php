<?php

use Illuminate\Database\Seeder;

class BlogArticlesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('blog_articles')->insert([
            [
                'id_blog' => 1,
                'title' => 'ARTICLE 1',
                'meta_key' => 'Meta, meta, meta',
                'meta_desc' => 'DEscription',
                'full_text' => 'wqfqqggggggggggggggggggggggggggggggggggggg'
            ],
            [
                'id_blog' => 1,
                'title' => 'ARTICLE 2',
                'meta_key' => 'Meta, meta, meta',
                'meta_desc' => 'DEscription',
                'full_text' => 'wqfqqggggggggggggggggggggggggggggggggggggg'
            ]]
        );
    }

}
