<?php
use Illuminate\Database\Seeder;
use App\Discussion;
class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $t1 = 'how detect whether a probablity distrubution is normal or poison';
        $t2 = 'Adaptiv huffman compression';
        $t3 = 'Concepts of Multicasting';
        $t4 = 'problem on solving Chomskey hierarchy';
        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi cupiditate dignissimos repellat ut consectetur corrupti beatae sed blanditiis, delectus odit, sequi possimus suscipit voluptate. Tempore dolorum inventore dolore repudiandae iste.',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];
        $d2 = [
            'title' => $t2,
            'content' => 'vuejs pagination Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi cupiditate dignissimos repellat ut consectetur corrupti beatae sed blanditiis, delectus odit, sequi possimus suscipit voluptate. Tempore dolorum inventore dolore repudiandae iste.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];
        $d3 = [
            'title' => $t3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi cupiditate dignissimos repellat ut consectetur corrupti beatae sed blanditiis, delectus odit, sequi possimus suscipit voluptate. Tempore dolorum inventore dolore repudiandae iste.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t3)
        ];
        $d4 = [
            'title' => $t4,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi cupiditate dignissimos repellat ut consectetur corrupti beatae sed blanditiis, delectus odit, sequi possimus suscipit voluptate. Tempore dolorum inventore dolore repudiandae iste.',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4)
        ];
        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}