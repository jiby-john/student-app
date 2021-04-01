@extends('basic') 

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="card-title">Update Marks</h1>
            @if(Session::has('message'))
            <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
            @endif
            <form method="post" action="{{ route('studentMarkUpdate', $studentMarks->id) }}">
                @method('PUT') 
                @csrf
                <div class="form-group">

                    <label for="name">Name:<span class="text-danger">*</span></label>
                    <select name="student_id" class="form-control">
                        <option value="" >{{__('Select')}}</option>
                        @if(isset($studentList[0]))
                        @foreach($studentList as $key)
                        <option @if(isset($studentMarks) && ($studentMarks->student_id == $key->id) && (empty(old('student_id')))) selected @elseif((old('student_id') != null) && (old('student_id') == $key->id)) selected @endif value="{{ $key->id }}">{{$key->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if($errors->has('student_id'))
                    <div class="error">{{ $errors->first('student_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="term">Term:<span class="text-danger">*</span></label>
                    <select name="term" class="form-control">
                        <option value="" >{{__('Select')}}</option>
                        @if(isset($terms))
                        @foreach($terms as $index=>$term)
                        <option @if(isset($studentMarks) && ($studentMarks->term == $index) && (empty(old('term')))) selected @elseif((old('term') != null) && (old('term') == $index)) selected @endif value="{{ $index }}">{{$term}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if($errors->has('term'))
                    <div class="error">{{ $errors->first('term') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject1">Maths:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject1"  @if(isset($studentMarks) && empty(old('subject1'))) value="{{$studentMarks->subject1}}" @else value="{{old('subject1')}}" @endif/>
                    @if($errors->has('subject1'))
                    <div class="error">{{ $errors->first('subject1') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject2">Science:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject2"  @if(isset($studentMarks) && empty(old('subject2'))) value="{{$studentMarks->subject2}}" @else value="{{old('subject2')}}" @endif/>
                    @if($errors->has('subject2'))
                    <div class="error">{{ $errors->first('subject2') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject3">History:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject3"  @if(isset($studentMarks) && empty(old('subject3'))) value="{{$studentMarks->subject3}}" @else value="{{old('subject3')}}" @endif/>
                    @if($errors->has('subject3'))
                    <div class="error">{{ $errors->first('subject3') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('studentMarkList')}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection