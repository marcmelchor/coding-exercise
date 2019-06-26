@extends('layouts.layout')

@section('title')
    <title>All Jobs</title>
@endsection

@section('content')
  <h1 class="title">Jobs</h1>

  <div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Job" />
  </div>

  <div id="toSearch" style="margin-bottom: 1em"></div>

  <form action="/create">
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Add Job</button>
      </div>
    </div>
  </form>

@endsection

