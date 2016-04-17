@extends('main')

@section('head')
<style>
    #index
    {
        float: right;
        margin-bottom: 3%;
    }
</style>
@endsection

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Skiny do dziennika
                <small>  ...żeby zielony już nie raził po oczach!</small>
                <a href="{{ URL::to('/') }}">
                    <button id="index" type="button" class="btn btn-lg btn-info">Powrót</button>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->
    <div class="row">
        <div class="col-md-7">
            <a href="https://chrome.google.com/webstore/detail/chromedzienniksimpleskin/bohghidmmhgihlcndmhjkcicbdpjlbab">
                <img class="img-responsive" src="../simple_skin.png" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Simple Skin</h3>
            <h4>Prosta skórka</h4>
            <p>Zmęczony patrzeniem na oczokłującą zieleń?<br>
                Ta skórka, biało-szaro-czarna, odciąży twoje oczy i zwiększy czytelność dziennika.<br>

                <strong>UWAGA:</strong> Nie testowane na koncie nauczycielskim, może wywoływać problemy.</p>
            <a class="btn btn-primary" href="https://chrome.google.com/webstore/detail/chromedzienniksimpleskin/bohghidmmhgihlcndmhjkcicbdpjlbab">Pobierz <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Two -->
    <div class="row">
        <div class="col-md-7">
            <a href="https://chrome.google.com/webstore/detail/chromedziennikunicornskin/bndheocniiokibdckkcmnegfgolkdlfb">
                <img class="img-responsive" src="../unicorn_skin.png" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Unicorn Skin</h3>
            <h4>Jednorożce!</h4>
            <p>Zmienia stronę logowania na taką różową, z jednorożcami. <br>
            Nie wpływa na resztę dziennika.
            </p>
            <a class="btn btn-primary" href="https://chrome.google.com/webstore/detail/chromedziennikunicornskin/bndheocniiokibdckkcmnegfgolkdlfb">Pobierz <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Three -->
    <div class="row">
        <div class="col-md-7">
            <a href="#">
                <img class="img-responsive" src="../question_mark.png" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Więcej skinów</h3>
            <h4>niebawem</h4>
            <p>Jeżeli masz pomysły, prośby lub pytania, pisz na marcin@lawniczak.me Postaram się odpowiedzieć jak najszybciej.</p>
        </div>
    </div>
    <!-- /.row -->

    <hr>
    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; Marcin Ławniczak 2015</p>
    </footer>
@endsection