<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('hs')  }}">
                Ekosowy turniej Hearthstone!
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('hs') }}">Strona główna</a></li>
                <li><a href="{{ URL::to('hs/rules') }}">Zasady</a></li>
                <li><a href="{{ URL::to('hs/ranks') }}">Ranking</a></li>
                <li><a href="{{ URL::to('hs/register') }}">Rejestracja</a></li>
                <li><a href="{{ URL::to('hs/contact') }}">Kontakt</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::to('/')  }}">Powrót do ekosme.me</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>