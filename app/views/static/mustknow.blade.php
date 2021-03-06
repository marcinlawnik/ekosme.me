@extends('main')

    @section('head')
    <style>
        #index
        {
            float: right;
            margin-bottom: 3%;
        }
    </style>
    <script src="/js/ekko-lightbox.js"></script>
    <link href="/css/ekko-lightbox.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    @endsection

    @section('content')

            <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{-- TODO Dynamic counter --}}
                X rzeczy, o których (nowy) uczeń EKOSu wiedzieć powinien
                <a href="{{ URL::to('/') }}">
                    <button id="index" type="button" class="btn btn-lg btn-info">Powrót</button>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <a href="/images/mustknow1.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow1.png" class="img-responsive">
                </a>
                <a href="/images/mustknow2.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow2.png" class="img-responsive">
                </a>
                <a href="/images/mustknow3.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow3.png" class="img-responsive">
                </a>
            </div>
            <br/>
            <div class="row">
                <a href="/images/mustknow4.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow4.png" class="img-responsive">
                </a>
                <a href="/images/mustknow5.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow5.png" class="img-responsive">
                </a>
                <a href="/images/mustknow6.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow6.png" class="img-responsive">
                </a>
            </div>
            <div class="row">
                <a href="/images/mustknow7.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow7.png" class="img-responsive">
                </a>
                <a href="/images/mustknow8.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow8.png" class="img-responsive">
                </a>
                <a href="/images/mustknow9.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow9.png" class="img-responsive">
                </a>
            </div>
            <div class="row">
                <a href="/images/mustknow_placeholder.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow_placeholder.png" class="img-responsive">
                </a>
                <a href="/images/mustknow_placeholder.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow_placeholder.png" class="img-responsive">
                </a>
                <a href="/images/mustknow_placeholder.png" data-toggle="lightbox" data-gallery="memes" class="col-sm-4">
                    <img src="/images/mustknow_placeholder.png" class="img-responsive">
                </a>
            </div>
        </div>
    </div>

    <!-- Site footer -->
        <br/>
    <footer class="footer">
        <p>&copy; Marcin Ławniczak i uczniowie EKOSu 2015-2017</p>
    </footer>
@endsection
