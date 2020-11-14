@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <select class="test w-100" id="test-select" name="states[]" multiple="multiple">
      <option value="AL">Alabama</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
      <option value="WY">Wyoming</option>
    </select>

<div class="row">
  <div class="col-md-4">
    <div class="pr-3">
        <img src="https://vistapointe.net/images/portrait-1.jpg" class="w-100 rounded-circle" style="max-width: 60px;">
    </div>
  </div>
  <div class="col-md-8">
    <p>test</p>
  </div>

</div>


</div>
@endsection
