<?php

class MemesTableSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 9) as $index) {
            Meme::create([
                'name'        => 'testmeme'.$index,
                'description' => $index,
                'filename'    => 'meme'.$index.'.jpg',
            ]);
        }
    }
}
