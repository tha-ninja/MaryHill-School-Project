@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
    body{
    background: #333;
}
.cover-card {
    border: 2px solid white;
    background: silver;
    padding: 0px;
    margin: 0px;
    height:200px;
}
.cover-card > p {
    text-align: center;
    background-color: rgba(6,6,6,0.0);
    color: rgba(6,6,6,0.0);
    width: 100%;
    height: 100%;
    font-weight: bold;
    font-size: 20px;
}
.cover-card:hover > p {
    background-color: rgba(6,6,6,0.3);
    color: white;
    text-shadow: 3px 3px 10px #000;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <div class="cover-card col-sm-8" style="background: url(http://lorempixel.com/600/200/nightlife/3) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
