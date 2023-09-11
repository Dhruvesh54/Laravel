@extends('master_layout')
@section('title')
    Mail
@endsection

@section('navbar')
@endsection


@section('body')
    <form action="{{ URL::to('/') }}/send_email" method="post">
        @csrf
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="nm" id="em1" aria-describedby="helpId"
            placeholder="Enter name">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="em" id="em1" aria-describedby="helpId"
            placeholder="Enter email">
        <input name="submit" id="" class="btn btn-primary" type="submit" value="Submit">

    </form>
@endsection
