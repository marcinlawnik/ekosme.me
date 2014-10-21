<html>
<head>
<style>
img {
        background: lightgrey;
        color: white;
        border-radius: 1em;
        padding: 2em;
        position: absolute;
        top: 60%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) }
P.blocktext {
    margin-left: auto;
    margin-right: auto;
    width: 10em
}

</style>
<script type="text/javascript">
</script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h3><P class="blocktext">{{{ $meme->name }}}<br /></P></h3>
<img class="" title="{{ $meme->name }}" src="{{{ $image }}}"></a><br />

 <P class="blocktext">{{{ $meme->description }}}<br /></P>
</body>
</html>
