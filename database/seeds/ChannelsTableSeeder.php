<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 =['title' => 'Applies maths'];
        $channel2 =['title' => 'Computer Networks'];
        $channel3 =['title' => 'Operating Systems'];
        $channel4 =['title' => 'Computer Architecture'];
        $channel5 =['title' => 'Automata Theory'];
        $channel6 =['title' => 'Networking Lab'];
        $channel7 =['title' => 'Unix lab'];
        $channel8 =['title' => 'Mcroprocessor lab'];
        $channel9 =['title' => 'Python lab'];
        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
    }
}
