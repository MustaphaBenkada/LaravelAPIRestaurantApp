@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <?php  if(\Session::has('success')) { ?>
        <div class="alert alert-success">
                {{ \Session::get('success') }}
        </div>
        <?php } ?>

            <div class="card card-new-task">
                <div class="card-header">New Restaurant</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('restaurant.store') }}">
                        
                        
        	                           @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                            <div class="col-md-6">
                                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                            <div class="col-md-6">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="type" class="col-md-4 col-form-label text-md-right">Type of Restaurant</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="type" name="type">
                                                <option value="1"   > American</option>
                                                    <option value="2"   >Arabic</option>
                                                    <option value="3"   >German</option>
                                                    <option value="4"   >Spanish</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>
                        
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">List of Restaurants</div>

                <div class="card-body">
                   <table class="table table-striped">
                   <tr>
                           <td>
                               <p> Id </p>
                               </td>
                               <td>
                               <p> Name </p>
                               </td>
                               <td>
                               <p> Description </p>
                               </td>
                               <td class="text-center" colspan="2">
                                  
                                      Actions
                                  
                               </td>
                               
                           </tr>
                       @foreach ($restaurants as $restaurant)
                       
                           <tr>
                           <td>
                               <p>{{ $restaurant->id }}</p>
                               </td>
                               <td>
                               <p>{{ $restaurant->name }}</p>
                               </td>
                               <td>
                               <p>{{ $restaurant->description }}</p>
                               </td>
                               <td class="text-right">
                                  
                                       <form method="POST" action="{{ route('restaurant.destroy', $restaurant->id) }}">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger">Delete</button>
                                       </form>
                                  
                               </td>
                               <td class="text-right">
                                  
                                       <form method="GET" action="{{ route('restaurant.show', $restaurant->id) }}">
                                           @csrf
                                           
                                           <button type="submit" class="btn btn-success">Update</button>
                                       </form>
                                  
                               </td>
                           </tr>
                       @endforeach
                   </table>

                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection