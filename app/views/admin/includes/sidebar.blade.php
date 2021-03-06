<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="">
            <a href="{{ URL::to('a') }}"><i class="fa fa-fw fa-dashboard"></i> Strona główna</a>
        </li>
        <li class="">
            <a href="{{ URL::to('a/mail/send') }}"><i class="fa fa-fw fa-dashboard"></i> Wyślij maila!</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#subs"><i class="fa fa-fw fa-arrows-v"></i> Subskrypcje <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="subs" class="collapse">
                <li>
                    <a href="{{ URL::to('a/subscribers') }}">Lista</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ URL::to('a/meme/send') }}"><i class="fa fa-fw fa-table"></i> Wyślij mema!</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Memy <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="{{ URL::to('a/meme/add') }}">Dodaj</a>
                </li>
                <li>
                    <a href="{{ URL::to('a/meme/list') }}">Lista</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{ URL::to('a/resend') }}"><i class="fa fa-fw fa-dashboard"></i> Wyślij ponownie kody</a>
        </li>
        <li class="">
            <a href="{{ URL::to('a/reports') }}"><i class="fa fa-fw fa-dashboard"></i> Raporty</a>
        </li>
        <li class="">
            <a href="{{ URL::to('a/proposed') }}"><i class="fa fa-fw fa-dashboard"></i> Zaproponowane memy</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->