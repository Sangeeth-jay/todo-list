@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Todo List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="Enter Task here">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        @if ($task->done == 0)
                                            <span class="badge text-bg-warning">Not Completed</span>
                                        @else
                                            <span class="badge text-bg-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success">Done</a>

                                        <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 3rem;
            color: rgb(47, 210, 255);
        }
    </style>
@endpush