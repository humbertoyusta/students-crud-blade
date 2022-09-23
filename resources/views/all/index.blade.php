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
                <div>
                    <form action="{{ route('student-delete', [$student->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                <a href="{{ route('student-edit', ['id' => $student->id]) }}" method="GET">
                    <button type="button" class="btn btn-warning">Edit</button>
                </a>
            </li>
        @endforeach
    </ol>
@endsection