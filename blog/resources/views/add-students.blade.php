@extends('layout.app')

<div class="container">
    <div class="row justify-content-center my-3">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="row text-center">
        <h2>Add Students</h2>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-5">
            <form action="add" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Enter name" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="Enter Phone" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">
                        Add Students
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>