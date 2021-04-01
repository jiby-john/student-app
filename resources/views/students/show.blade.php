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

                <table class="table table-striped table-bordered" id="student">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>Gender</td>
                            <td>Reporting Teacher</td>
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

        $('#student').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            responsive: true,
            bSort:false,
            ajax: '{{route("studentList")}}',
            columns: [
            {"data": "id","name": "id"},    
            {"data": "name","name": "name"},                 
            {"data": "age","name": "age"},
            {"data": "gender","name": "gender"},
            {"data": "reporting_teacher","name": "reporting_teacher"},                
            {"data": "actions",orderable: false, searchable: true}

            ],
            language: {
                searchPlaceholder: "Search by Name"
            }
        });
    });
</script>
@endsection