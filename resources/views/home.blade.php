@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <div class="links">
                       <a href="{{route('restaurant.index')}}">List of Restaurants</a>
                       <br>
                       <a href="{{url('/api/restaurant/getRestaurant/4?api_token=CkQFAycSRlu14k2ivRM2CjmWO4KAJgaBO1a5P2O65ESdqBFWBTRikzIsthrsUjFThk22Z6Sd4XAlicgm')}}">API Test ( api_token=CkQFAycSRlu14k2ivRM2CjmWO4KAJgaBO1a5P2O65ESdqBFWBTRikzIsthrsUjFThk22Z6Sd4XAlicgm )</a>
                       <br>
                       <a href="{{url('/api/restaurant/getRestaurant/1?api_token=CkQFAycSRlu14k2ivRM2CjmWO4KAJgaBO1a5P2O65ESdqBFWBTRikzIsthrsUjFThk22Z6Sd4XAlicgm')}}">API Test ( api_token=tberDp0zkDGkkArvc0HTXL9lN66IlSKNHvjmCcgDeKahFfLB2VadXPoklUyyk3bpX01UZKckv2SX6eaA ) </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
