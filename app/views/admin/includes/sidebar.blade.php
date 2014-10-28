<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="{{ URL::to('a') }}"><i class="fa fa-fw fa-dashboard"></i> Strona główna</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#subs"><i class="fa fa-fw fa-arrows-v"></i> Subskrypcje <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="subs" class="collapse">
                <li>
                    <a href="{{ URL::to('a/meme/add') }}">Lista</a>
                </li>
                <li>
                    <a href="{{ URL::to('a/meme/list') }}">Wyślij mema</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
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
    </ul>
</div>
<!-- /.navbar-collapse -->