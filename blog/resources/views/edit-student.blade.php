@extends('layout.app')


<div class="container mt-4">
    <div class="row text-center">
        <h2 class="mb-4">Update Student</h2>
    </div>

    

            <form action="{{ url('update-student/'.$data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" placeholder="Enter name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Student Email</label>
                    <input type="email" name="email" value="{{ $data->email }}" placeholder="Enter email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Student Phone</label>
                    <input type="text" name="phone" value="{{ $data->phone }}" placeholder="Enter phone" class="form-control" required>
                </div>

                <div class="text-center">
                    <button class="btn btn-warning">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</div>

