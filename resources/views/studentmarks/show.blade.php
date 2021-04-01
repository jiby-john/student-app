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

                <table class="table table-striped table-bordered" id="studentMark">
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
                            <td>Actions</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('#studentMark').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            responsive: true,
            bSort:false,
            bFilter:false,
            ajax: '{{route("studentMarkList")}}',
            columns: [
            {"data": "id","name": "id"},    
            {"data": "student_id","name": "student_id"},                 
            {"data": "subject1","name": "subject1"},
            {"data": "subject2","name": "subject2"},
            {"data": "subject3","name": "subject3"}, 
            {"data": "term","name": "term"},
            {"data": "total_marks","name": "total_marks"}, 
            {"data": "created_at","name": "created_at"},                 
            {"data": "actions",orderable: false, searchable: false}

            ],

        });
    });
</script>
@endsection