<?php

class CodesTableSeeder extends Seeder
{
    public function run()
    {
        $hashids = new Hashids\Hashids(Config::get('app.key'), 8);

        foreach (range(1, 9) as $index) {
            Code::create([
                'code'    => $hashids->encode($index.'223'),
                'meme_id' => $index,
                'used'    => 0,
            ]);
        }
    }
}
