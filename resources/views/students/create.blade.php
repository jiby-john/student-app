@extends('basic')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="card-title">Add Student</h1>
            <div>
                <form method="post" action="{{ route('studentSave') }}">
                    @csrf
                    <div class="form-group">    
                        <label for="name">Student Name:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" @if(!empty(old('name')))) value="{{old('name')}}" @endif/>
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="age">Age:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="age"  @if(!empty(old('age')))) value="{{old('age')}}" @endif/>
                        @if($errors->has('age'))
                        <div class="error">{{ $errors->first('age') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:<span class="text-danger">*</span></label><br>
                        <input type="radio" name="gender" value="M" @if((old('gender') != null) && (old('gender') == 'M')) checked @endif> Male
                        <input type="radio" name="gender" value="F" @if((old('gender') != null) && (old('gender') == 'F')) checked @endif> Female
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
                            <option @if((old('reporting_teacher') != null) && (old('reporting_teacher') == $teacher->id)) selected @endif value="{{ $teacher->id }}">{{$teacher->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        @if($errors->has('reporting_teacher'))
                        <div class="error">{{ $errors->first('reporting_teacher') }}</div>
                        @endif
                    </div> 
                    <button type="submit" class="btn btn-primary-outline">Add student</button>
                    <a href="{{ route('studentList')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

