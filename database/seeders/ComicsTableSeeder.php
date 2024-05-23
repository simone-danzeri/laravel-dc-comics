<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comicsArray = config('comics');
        foreach($comicsArray as $eachComic) {
            $newComic = new Comic();
            $newComic->title = $eachComic['title'];
            $newComic->description = $eachComic['description'];
            $newComic->thumb = $eachComic['thumb'];
            $newComic->price = $eachComic['price'];
            $newComic->series = $eachComic['series'];
            $newComic->sale_date = $eachComic['sale_date'];
            $newComic->type = $eachComic['type'];
            $newComic->save();
        }
    }
}
