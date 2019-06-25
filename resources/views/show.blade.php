@extends('layouts.layout')

@section('title')
    <title>Show</title>
@endsection

@section('content')

  <div class="box">
    <p>
      <b>Title:</b> {{ $job->title }}
    </p>
    <p>
      <b>Company:</b> {{ $job->company->name }}
    </p>
    <p>
      <b>Description:</b> {{ $job->description }}
    </p>
    <p>
      <b>Location:</b> {{ $job->location }}
    </p>
    <p>
      <b>Published:</b> {{ $job->published_at }}
    </p>

    @if ($job->active)
      <form method="POST" action="/job/{{ $job->id }}/apply">
        @method('PATCH')
        @csrf
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">Apply</button>
          </div>
        </div>
      </form>

    @else
      <p style="margin-bottom: 1em"><b>--- Job no longer active ---</b></p>
    @endif
      <a href="/">Back to jobs list</a>
  </div>

@endsection
