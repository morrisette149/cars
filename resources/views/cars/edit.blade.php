@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit the Data') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('cars:update', $car) }}">
                    @csrf
                  <div class="form-group">
                    <label> Car Name: </label>
                    <input type="text" value="{{ $car->carname }}" name="carname" class="form-control">
                  </div>

                  <div class="form-group">
                    <label> Car Colour: </label>
                    <input type="text" value="{{ $car->carcolour }}" name="carcolour" class="form-control">
                  </div>

                  <div class="form-group">
                    <label> Price (RM): </label>
                    <input type="text" step="0.01" min="0" value="{{ $car->rangeprice }}" name="rangeprice" class="form-control">
                  </div>
                <br>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
