@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('/todos/' . $todo->id) }}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="todo" class="form-control" placeholder="Create a new todo" value="{{ $todo->todo }}">
            </form>
        </div>
    </div>

@endsection
