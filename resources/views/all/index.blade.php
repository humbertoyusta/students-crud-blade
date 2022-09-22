@extends('app')

@section('content')
    <ol class="list-group list-group-numbered">
        @foreach($students as $student)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $student->firstname }} {{ $student->lastname }}</div>
                    {{ $student->email }}
                </div>
                <button type="button" class="btn btn-primary">See profile</button>
                <button type="button" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-warning">Edit</button>
            </li>
        @endforeach
    </ol>
@endsection