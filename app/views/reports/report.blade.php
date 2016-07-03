@extends('main')
@section('head')
    <title>
        <?php $name = explode('@', $subscriber->email); ?>
        Raport_Końcoworoczny_2014-2015_{{ $name[0] }}
    </title>
    <style>
        .row
        {
            margin-top: 5%;
        }
        #meme
        {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .page-break {
            page-break-after: always;
        }
        .meme_text {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            font-size: large;
        }
        .logo {
            max-width:500px;
            max-height:100%;
            margin: auto;
        }
        .logo_text {
            margin: auto;
            text-align: center;
            font-family: "Comic Sans MS";
        }
        .title {
            text-align: center;
            font-size: 36px !important;
            font-weight: bold !important;
        }
        .signature{
            text-align: right;
            font-weight: bold !important;
        }
        .justified {
            text-align: justify;
            text-indent: 10%;
        }
        .logo_div {
            margin-bottom: 80px !important;
        }
        .centered {
            text-align: center;
        }
        @media print {
            html, body {
                height: 99%;
            }
        }
    </style>
@endsection

@section('content')

    @if($type == 'yearly')
        @include('reports.2015-2016.textBeforeYearly')
    @endif
    @if($type == 'full')
        @include('reports.2015-2016.textBeforeFull')
    @endif

    @foreach($memes as $meme)
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="jumbotron">
                    <div class="page-header">
                        <h1>
                            {{ $meme->name }} <small><small>{{ $meme->description }}</small></small>
                        </h1>
                    </div>
                    <div class="">
                        <img id="meme" class="img-responsive img-thumbnail" title="{{ $meme->name }}" src="{{ '/images/'.$meme->filename }}">
                    </div>
                    <br>
                    <div class="">
                        @if( $stats[$meme->id]['meme_text'] === 0)
                            <img id="meme" class="img-responsive img-thumbnail" title="Meme Stats" src="{{ '../charts/meme/'.$meme->id.'/subscriber/'.$subscriber->id }}">
                        @else
                            <div class="meme_text">{{ $stats[$meme->id]['meme_text'] }}</div>
                        @endif
                    </div>

                    {{--
                            // Check if user recieved meme -> not -> break "didnt recieve meme"
            // Check if user voted on meme -> not -> break "didnt vote on meme"
            // Print end generate stats, including:
            // Pie chart: yes vote, no vote, didnt vote
            // Include how user voted

                    --}}
                </div>
            </div>
        </div>
        {{-- Page break for PDF --}}
        <div class="page-break"></div>
    @endforeach

@endsection