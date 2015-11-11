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

        //Change name
        $filename = Helper::getRandomString().'.'.Input::file('meme')->getClientOriginalExtension();

        //Save
        Input::file('meme')->move(storage_path().'/memes/', $filename);

        //Add to database
        $meme = Meme::create([
            'filename' => $filename,
            'name' => Input::get('title'),
            'description' => Input::get('description')
        ]);

        $hashids = new Hashids\Hashids(Config::get('app.key'), 8);
        $id = $hashids->encode($meme->id);
        //Return link
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

    function getConfirmSubscribe($code){
        if(Subscriber::where('activation_code', '=', $code)->exists() === false){
            //Throw error
            return View::make('subscribe')->with('error', 'Konto zostało już zatwierdzone!');
        }
        $subscriber = Subscriber::where('activation_code', '=', $code)->first();
        $subscriber->active = 1;
        $subscriber->activation_code = null;
        $subscriber->save();

        //Send email to subscriber that account was confirmed
        Queue::push('SendEmail', [
            'view' => 'emails.confirmed',
            'recipient' => $subscriber->email,
            'subject' => 'Potwierdzenie konta ekosme.me',
            'data' => []
        ]);

        return View::make('subscribe')->with('message', 'Użytkownik potwierdzony!');
    }
}