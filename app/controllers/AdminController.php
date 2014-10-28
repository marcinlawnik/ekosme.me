<?php

class AdminController extends \BaseController {

    function getIndex()
    {
        return View::make('admin.index');
    }

    function getMemeAdd(){
        return View::make('admin.meme.add');
    }

    function postMemeAdd(){
        //przyjmij plik
        if (!Input::hasFile('meme'))
        {
            return Redirect::to('/a/meme/add')->with('error', 'Nie dodano pliku!');
        }

        //zapisz
        //zmien nazwe
        $filename = Helper::getRandomString().'.'.Input::file('meme')->getClientOriginalExtension();
        Input::file('meme')->move(storage_path().'/memes/', $filename);

        //dodaj do bazy
        $meme = Meme::create([
            'filename' => $filename,
            'name' => Input::get('title'),
            'description' => Input::get('description')
        ]);
        //wygeneruj kody
//        $codes = [];
//        foreach(range(1, Input::get('code_amount')) as $index){
//            $code = Helper::getRandomString(20);
//            $codes[$index] = $code;
//            Code::create([
//                'code' => $code,
//                'meme_id' => $meme->id,
//                'used' => 0
//            ]);
//        }
        $hashids = new Hashids\Hashids(Config::get('app.key'), 8);
        $id = $hashids->encode($meme->id);
        //zwroc link
        return View::make('admin.meme.add')->with('message', 'Dodano! Mem dostępny pod adresem '.URL::to('v/'.$id));
    }

    function getMemeList(){
        $memes = Meme::all();

        if($memes->isEmpty()){
            return Redirect::to('a')->with('error', 'Nie ma jeszcze memów!');
        }

        foreach($memes as $meme){
            $path = storage_path().'/memes/'.$meme->filename;

            $images[$meme->id] = Image::make($path)->heighten('100')->encode('data-url');

            $codeInfo[$meme->id] = [
                //wszystkie kody
                'code_amount' => $meme->codes()->count(),
                //kody zużyte
                'code_used' => $meme->codes()->where('used', '=','1')->count(),
                //kody niezużyte, wysłane
                'code_sent' => $meme->codes()->where('used', '=','0')->where('subscriber_id', '!=', 'null')->count(),
                //kody nieużyte, niewysłane
                'code_unused' => $meme->codes()->where('used', '=', '0')->where('description')->count(),
            ];
        }



        return View::make('admin.meme.list')->withMemes($memes)->withImages($images)->withInfo($codeInfo);
    }

    function getMemeEdit($id){
        $meme = Meme::find($id);
        $path = storage_path().'/memes/'.$meme->filename;
        $image = Image::make($path)->encode('data-url');

        return View::make('admin.meme.edit')->withMeme($meme)->withImage($image);
    }

    function postMemeEdit($id){
        $meme = Meme::find($id);
        $path = storage_path().'/memes/'.$meme->filename;
        $image = Image::make($path)->heighten('100')->encode('data-url');

        return View::make('admin.meme.edit')->withMeme($meme)->withImage($image)->with('message', 'Zapisano zmiany!');
    }
}