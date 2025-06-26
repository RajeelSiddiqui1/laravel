@extends('layout.app')

<div class="container my-3">
    <div class="row justify-content-center my-3">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="row text-center">
        <h2>All Students</h2>
    </div>
    <div class="row my-3">
        <form action="{{ url('search') }}" method="get" class="d-flex mb-3">
            <input type="text" name="search" placeholder="Search students" value="{{ request('search') }}" class="form-control me-2">
            <button class="btn btn-info">Search</button>
        </form>

    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-md-2">
            <a href="/add" class="btn btn-success">
                Add Students
            </a>
        </div>

    </div>
    <div class="row mt-3">
        <table class="table table-bordered ">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">UpdatedAt</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $std)
                <tr>
                    <td>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                    <td>{{ $std->name }}</td>
                    <td>{{ $std->email }}</td>
                    <td>{{ $std->phone }}</td>
                    <td>{{ $std->created_at }}</td>
                    <td>{{ $std->updated_at }}</td>
                    <td>
                        <a href="{{ 'delete/'.$std->id }}" class="btn btn-danger">Delete</a>
                        <a href="{{ 'edit-student/'.$std->id }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        {{ $students->links('pagination::bootstrap-5') }}
    </div>
</div>