@extends('app')

@section('content')
    <div class="card" style="width: 18rem;">
        <img src="{{ url('storage/'.$student->image) }}"
 style="height: 200px; width: 250px;" class="card-img-top" alt="Profile photo">
        <div class="card-body">
            <h5 class="card-title">{{ $student->firstname }} {{ $student->lastname }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email: {{ $student->email }}</li>
            <li class="list-group-item">Address: {{ $student->address }}</li>
            <li class="list-group-item">Score: {{ $student->score }}</li>
        </ul>
    </div>
@endsection