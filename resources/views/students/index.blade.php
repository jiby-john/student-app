@extends('basic')

@section('main')
<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}  
    </div>
    @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('studentCreate')}}" class="btn btn-primary">New student</a>
    <a style="margin: 19px;" href="{{ route('studentMarkList')}}" class="btn btn-primary">Studentmark List</a>
</div> 
<div class="card">
    <div class="card-body"> 
        <div class="row">
            <div class="col-sm-12">
                <h1 class="card-title">Student List</h1>   

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>Gender</td>
                            <td>Reporting Teacher</td>
                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}} {{$student->last_name}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{ \App\Models\Teacher::where(['id' => $student->reporting_teacher])->pluck('name')->first() }}</td>
                            <td>
                                <a href="{{ route('studentEdit',$student->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('studentDelete', $student->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
