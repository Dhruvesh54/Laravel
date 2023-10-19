@extends('master_layout')
@section('title')
    Registration
@endsection

@section('navbar')
@endsection

@section('body')
    <form action="{{ URL::to('/') }}/data" method="post">
        @csrf
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="nm" id="em1" aria-describedby="helpId"
            placeholder="Enter name">
        <br>
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="em" id="em1" aria-describedby="helpId"
            placeholder="Enter email">
        <br>
        <label for="" class="form-label">Password</label>
        <input type="text" class="form-control" name="pwd" id="em1" aria-describedby="helpId"
            placeholder="Enter Password">
        <br>
        <input name="submit" id="" class="btn btn-primary" type="submit" value="Submit">

    </form>
@endsection
