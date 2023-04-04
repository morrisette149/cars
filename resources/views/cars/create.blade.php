@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Car Data') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars:store')}}" enctype="multipart/form-data"><!--enctype is used to insert the attchment-->
                        @csrf <!-- to avoid the page expired -->
                        <div class="form-group">
                            <label>Car Name: </label>
                            <input type="text" class="form-control" name="carname" placeholder="Enter the car name here">
                        </div>

                        <div class="form-group">
                            <label>Car Colour: </label>
                            <input type="text" class="form-control" name="carcolour" placeholder="Enter the car colour here">
                        </div>

                        <div class="form-group">
                            <label>Price (RM): </label>
                            <input type="text" step="0.01" min="0" class="form-control" name="rangeprice" placeholder="Enter the car price here">
                        </div>

                        <div class="form-group">
                            <label>Attachment (Share car images in the form of png/jpeg/pdf): </label>
                            <input type="file" class="form-control" name="attachment">
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
