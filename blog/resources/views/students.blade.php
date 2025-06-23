@extends('layout.app')

<div class="container my-3">
    <div class="row text-center">
        <h2>All Students</h2>
    </div>
    <div class="row mt-3">
        <table class="table table-bordered ">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $std)
                <tr>
                    <td>{{ $std->id }}</td>
                    <td>{{ $std->name }}</td>
                    <td>{{ $std->email }}</td>
                    <td>{{ $std->age }}</td>
                    <td>{{ $std->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

