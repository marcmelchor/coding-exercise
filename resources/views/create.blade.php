@extends('layouts.layout')

@section('title')
    <title>All Jobs</title>
@endsection

@section('content')
  <h1 class="title">Jobs</h1>

  <div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Job" />
  </div>

  @foreach ($jobs as $job)
    <div class="box">
      <p><b>Title:</b> '.$job->title.'</p>
      <p><b>Company:</b> '.$job->company->name.'</p>
      <a href="/job/'.$job->id.'">See details</a>
    </div>
  @endforeach

  <div style="margin-bottom: 1em">
    {{ $jobs->links() }}
  </div>

  <form method="GET" action="/job/create">
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Add Job</button>
      </div>
    </div>
  </form>

@endsection
