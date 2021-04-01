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
    <a style="margin: 19px;" href="{{ route('studentMarkCreate')}}" class="btn btn-primary">New student mark</a>
    <a style="margin: 19px;" href="{{ route('studentList')}}" class="btn btn-primary">Student List</a>
</div> 
<div class="card">
    <div class="card-body"> 
        <div class="row">
            <div class="col-sm-12">
                <h1 class="card-title">Student Mark List</h1>   

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Maths</td>
                            <td>Science</td>
                            <td>History</td>
                            <td>Term</td>
                            <td>Total Marks</td>
                            <td>Created On</td>
                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentMarks as $studentMark)
                        <tr>
                            <td>{{$studentMark->id}}</td>
                            <td>{{$studentMark->getStudent->name}}</td>
                            <td>{{$studentMark->subject1}}</td>
                            <td>{{$studentMark->subject2}}</td>
                            <td>{{$studentMark->subject3}}</td>
                            <td>{{$studentMark->term}}</td>
                            <td>{{$studentMark->total_marks}}</td>
                            <td>{{\Carbon\Carbon::parse($studentMark->created_at)->format('M d, Y h:i A')}}</td>
                            <td>
                                <a href="{{ route('studentMarkEdit',$studentMark->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('studentMarkDelete', $studentMark->id)}}"  method="post">
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
