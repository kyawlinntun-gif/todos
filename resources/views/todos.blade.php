@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="{{ url('/todos/add') }}" method="POST">
                @csrf
                <input type="text" name="todo" class="form-control" placeholder="Create a new todo">
            </form>
        </div>
    </div>

    <hr/>

    @foreach ($todos as $todo)
        {{ $todo->todo }} <a class="btn btn-danger" onclick="deleteTodo({{ $todo->id }})">x</a>
        <a href="{{ url('/todos/' . $todo->id) }}" class="btn btn-sm btn-info">Update</a>
        <form action="{{ url('/todos/' . $todo->id) }}" method="post" id="deleteTodo{{ $todo->id }}" style="display: none;">
            @csrf
            @method('delete')
        </form>
        @if(!$todo->completed)
            <button class="btn btn-sm btn-success" onclick="completedTodo({{ $todo->id }})">Mark as completed</button>
            <form action="{{ url('/todos/completed/' . $todo->id) }}" method="POST" id="completedTodo{{ $todo->id }}" style="display: none;">
                @csrf
                @method('put')
            </form>
        @else
            Completed!
        @endif
        <hr/>
    @endforeach
@endsection

@section('js')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        function deleteTodo(id)
        {
            event.preventDefault();
            document.getElementById("deleteTodo" + id).submit();
        }

        function completedTodo(id)
        {
            event.preventDefault();
            document.getElementById("completedTodo" + id).submit();
        }
    </script>
@endsection
