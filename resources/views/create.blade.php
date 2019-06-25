@extends('layouts.layout')

@section('title')
    <title>Create Job</title>
@endsection

@section('content')
  <h1 class="title">Create Job</h1>

  <form method="POST" action="/" class="box">
    @csrf

    <div class="field">
      <label class="label" for="title">Job Title</label>

      <div class="control">
        <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" required>
      </div>
    </div>

    <div class="field">
      <label class="label" for="title">Company</label>

      <div class="control">
        <select class="form-comtrol" name="company_id">
          @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="field">
      <label class="label" for="description">Job Description</label>

      <div class="control">
        <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required>{{ old('description') }}</textarea>
      </div>
    </div>

    <div class="field">
      <label class="label" for="location">Location</label>

      <div class="control">
        <textarea name="location" class="textarea" required>{{ old('location') }}</textarea>
      </div>
    </div>

    <div class="field" style="margin-bottom: 1em">
      <div class="control">
        <button type="submit" class="button is-link">Create Job</button>
      </div>
    </div>

    @include('layouts.errors')

  </form>

  <form action="/">
    <div class="field">
      <div class="control">
        <button type="submit" class="button">Cancel</button>
      </div>
    </div>
  </form>

@endsection
