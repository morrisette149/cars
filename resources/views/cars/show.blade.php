@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show List of Cars') }}</div>

                <div class="card-body">
                  <div class="form-group">
                    <label> Car Name: </label>
                    <input type="text" value="{{ $car->carname }}" name="carname" class="form-control" readonly>
                  </div>

                  <div class="form-group">
                    <label> Car Colour: </label>
                    <input type="text" value="{{ $car->carcolour }}" name="carcolour" class="form-control" readonly>
                  </div>

                  <div class="form-group">
                    <label> Price (RM): </label>
                    <input value="{{ $car->rangeprice }}" name="rangeprice" class="form-control" readonly>
                  </div>
                  <br>
                  <!--if to open the attachment-->
                  @if ($car->attachment)
                    <a target="_blank" href="{{ $car->attachment_url }}" class="btn btn-info">Open Attachment</a>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
