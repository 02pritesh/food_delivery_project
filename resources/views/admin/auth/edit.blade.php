@extends('admin.main.main')

@section('admin-content')
        <div class="col-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ url('edit') }}">
                        @csrf
    
                        <div class="form-group">
                            <label for="exampleInputEmail3"></label>
                            <input type="hidden" class="form-control" id="exampleInputId1" 
                                name="id" value="{{$user->id}}">
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                name="name" value="{{$user->name}}">
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="date" class="form-control" id="exampleInputEmail3" placeholder="Email"
                                name="email" value="{{$user->email}}">
                        </div>
    
                        {{-- <div class="form-group">
                            <label for="exampleInputCity1">Image</label>
                            <input type="file" class="form-control" id="exampleInputCity1" name="image" value="{{$user->image}}">
                            <img src="{{ asset('assets/uploads/' . $user->image) }}" alt=""  style="width:100px ; hight:100px"/>
                        </div> --}}
    
                        <div class="form-group">
                            <label for="exampleInputEmail3">Mobile No</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Mobile Number"
                                name="mobile_no" value="{{$user->mobile_no}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

