@extends('admin.main.main')

@section('admin-content')

@if(session('success'))
<div class="alert alert-success">
   {{ session('success')}}
</div>
@endif

<div class="col-12 grid-margin stretch-card mt-5">
    <div class="card">
        <div>
            <h3 class="text-center mb-5">User submited Record</h3>
            <br>
            <table class="table table-success table-striped">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Mobile</td>
                    <td>Action</td>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        {{-- <td><img src="{{ asset('assets/uploads/' . $userform->image) }}" alt="" /></td> --}}
                        <td>{{ $user['mobile'] }}</td>
                        <td>
                            
                            <a href={{"delete/".$user['id']}}  class="mr-2 btn btn-danger" onclick="return Delete()"><i class="fa-solid fa-trash-can"></i></a>
                            <a href={{"edit/".$user['id']}} class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

<script>
    function Delete(){
        return confirm('delete');
    }
</script>


@endsection