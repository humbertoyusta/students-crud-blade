@extends('app')

@section('content')
    <form name="form" id="form" action="{{ route('student-edit', ['id' => $student->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="emailHelp" value="{{ $student->firstname }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="emailHelp" value="{{ $student->lastname }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $student->email }}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" value="{{ $student->address }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Score</label>
            <input type="number" step="0.01" name="score" class="form-control" id="score" aria-describedby="emailHelp" value="{{ $student->score }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit student</button>
    </form>
@endsection