<?php
use App\Channel;
use Illuminate\Database\Seeder;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Applied Mathematics', 'slug' => str_slug('Applied Mathematics') ];
        $channel2 = ['title' => 'Computer Networks', 'slug' => str_slug('Computer Networks') ];
        $channel3 = ['title' => 'Operating Systems', 'slug' => str_slug('Operating Systems') ];
        $channel4 = ['title' => 'Computer Orgz & Arch', 'slug' => str_slug('Computer Orgz & Arch')];
        $channel5 = ['title' => 'Automata Theory', 'slug' => str_slug('Automata Theory')];
        $channel6 = ['title' => 'Networking Lab', 'slug' => str_slug('Networking Lab')];
        $channel7 = ['title' => 'Unix Lab', 'slug' => str_slug('Unix Lab')];
        $channel8 = ['title' => 'Microprocessor Lab', 'slug' => str_slug('Microprocessor Lab')];
        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}