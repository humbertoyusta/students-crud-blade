@extends('app')

@section('content')
    <form name="form" id="form" action="{{ route('student-add') }}" method="POST">
        @csrf

        @if (session('success'))
            <h5 class="alert alert-success">{{ session('success') }}</h5>
        @endif

        @foreach($errors->all() as $err)
            <h5 class="alert alert-danger">{{ $err }}</h5>
        @endforeach
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Score</label>
            <input type="number" step="0.01" name="score" class="form-control" id="score" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection