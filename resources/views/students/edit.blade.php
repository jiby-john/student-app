@extends('basic') 
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="card-title">Update Student</h1>


            <form method="post" action="{{ route('studentUpdate', $student->id) }}">
                @method('PUT') 
                @csrf
                <div class="form-group">

                    <label for="name">Name:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $student->name }}" />
                    @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="age">Age:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="age" value="{{ $student->age }}" />
                    @if($errors->has('age'))
                    <div class="error">{{ $errors->first('age') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="gender">Gender:<span class="text-danger">*</span></label>
                    <input type="radio" name="gender" @if(isset($student) && ($student->gender == 'M') && (empty(old('gender')))) checked @elseif((old('gender') != null) && (old('gender') == 'M')) checked @endif value="M"> Male
                    <input type="radio" name="gender" @if(isset($student) && ($student->gender == 'F') && (empty(old('gender')))) checked @elseif((old('gender') != null) && (old('gender') == 'F')) checked @endif value="F"> Female
                    @if($errors->has('gender'))
                    <div class="error">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="reporting_teacher">Reporting Teacher:<span class="text-danger">*</span></label>
                    <select name="reporting_teacher" class="form-control">
                        <option value="" >{{__('Select')}}</option>
                        @if(isset($teachers))
                        @foreach($teachers as $teacher)
                        <option @if(isset($student) && ($student->reporting_teacher == $teacher->id) && (empty(old('reporting_teacher')))) selected @elseif((old('reporting_teacher') != null) && (old('reporting_teacher') == $teacher->id)) selected @endif value="{{ $teacher->id }}">{{$teacher->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if($errors->has('reporting_teacher'))
                    <div class="error">{{ $errors->first('reporting_teacher') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('studentList')}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection