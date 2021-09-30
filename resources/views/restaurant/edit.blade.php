@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Restaurant informations</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('restaurant.update',  $restaurant->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                       <input type="hidden" name="_method" value="PUT">
        	                           @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $restaurant->name) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                                            <div class="col-md-6">
                                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description', $restaurant->description) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Address</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $restaurant->address) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                            <div class="col-md-6">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $restaurant->phone_number) }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="type" class="col-md-4 col-form-label text-md-right">Type of Restaurant</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="type">
                                                    <option value="1"  <?php if($restaurant->type == 1 )  echo 'selected=""'  ?> > American</option>
                                                    <option value="2"  <?php if($restaurant->type == 2 )  echo 'selected=""'   ?> >Arabic</option>
                                                    <option value="3"  <?php if($restaurant->type == 3 )  echo 'selected=""'   ?> >German</option>
                                                    <option value="4"  <?php if($restaurant->type == 4 )  echo 'selected=""'   ?> >Spanish</option>
                                                </select>
                                            </div>
                                        </div>
                                       <!--
                                        <div class="form-group row">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Restaurant Image</label>
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control" name="image">
                                                @if ($restaurant->image)
                                                    <code>{{ $restaurant->image }}</code>
                                                @endif
                                            </div>
                                        </div>-->
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Update Restaurant</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection