@if(isset($message))
<p class="alert alert-success col-sm-12" style="margin-left:2%;margin-right:2%; width:96%">{{ $message }}</p>
@endif
@if(isset($error))
<p class="alert alert-danger col-sm-12" style="margin-left:2%;margin-right:2%; width:96%">{{ $error }}</p>
@endif