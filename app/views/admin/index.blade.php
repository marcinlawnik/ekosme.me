@extends('admin.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Najnowszy mem</h3>
                </div>
                <div class="panel-body text-center">
                    <img id="meme" class="img-responsive img-thumbnail" title="{{ $meme->name }}" src="{{ '/images/'.$meme->filename }}">
                    <div class="panel-footer">

                        <p>{{ $stats['meme_title']  }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
@endsection