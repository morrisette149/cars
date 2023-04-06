@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--if for alert message-->
            @if (session()->has('alert'))
            <div class="alert {{ session()->get('alert-type') }}">
                {{ session()->get('alert')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Show List of Car') }}</div>

                <!--make another form for searching-->
                <div class="float-right">
                    <form method="" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword"
                                value="{{ request()->get('keyword') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                        </div>
                    </form>
                </div>
                <!--create new table to display the data and action button-->
                <div class="card-body">
                   <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Car Name</th>
                            <th>Car Colour</th>
                            <th>Price (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car) 
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->carname }}</td>
                            <td>{{ $car->carcolour }}</td>
                            <td>{{ $car->rangeprice }}</td>
                            <td>
                                <a href="{{ route('cars:show', $car) }}" class="btn btn-success">Show</a><br>
                                <a href="{{ route('cars:edit', $car) }}" class="btn btn-primary">Edit</a><br>
                                <a onclick="return confirm('Are you sure you want to delete this data?')"href="{{ route('cars:delete', $car)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                   <!--call the Paginator, $cars dari controller-->
                   {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection