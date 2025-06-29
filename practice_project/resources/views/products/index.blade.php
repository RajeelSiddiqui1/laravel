@extends('layout.app')

<div class="container-fluid">
    <!-- Header -->
    <div class="row bg-dark text-white text-center py-4 shadow">
        <div class="col">
            <h2 class="mb-0">Laravel 12 CRUD</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
        @endif

    </div>

    <div class="row text-center">
        <div class="col-md-10">
            @if (Auth::check())
            <p>Welcome {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
            @endif
        </div>
<div class="col-md-2">
    <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
</div>
    </div>

    <!-- Create Button -->
    <div class="row justify-content-end p-0 mt-3 pe-4">
        <div class="col-md-1">
            <a href="{{ route('products.create') }}" class="btn btn-dark w-100">Create</a>
        </div>
    </div>

    <!-- Card Content -->
    <div class="row justify-content-center mt-4 my-3">
        <div class="col-md-10">
            <div class="card shadow border-0 rounded-4">
                <!-- Card Header -->
                <div class="card-header bg-dark text-white text-center rounded-top-4 ">
                    <h4 class="mb-0">📦 Products List</h4>
                </div>

                <!-- Card Body with Light Table -->
                <div class="card-body p-4 bg-white text-dark rounded-bottom-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isNotEmpty())
                            @foreach ($products as $pd )
                            <tr class="text-center">
                                <th scope="row">{{ $pd->id }}</th>
                                <td><img src="{{ $pd->image ? asset('uploads/products/' . $pd->image) : asset('https://placehold.co/600x400') }}" width="80" height="80" alt="Product">
                                </td>
                                <td>{{$pd->name}}</td>
                                <td>{{$pd->sku}}</td>
                                <td>{{$pd->price}}</td>
                                <td>
                                    {!! $pd->status == "Active"
                                    ? '<span class="badge bg-success">Active</span></td>'
                                :'<span class="badge bg-warning">Inactive</span></td>' !!}

                                <td>
                                    <a href="{{ route('products.edit', $pd->id) }}" class="btn btn-sm btn-dark">Edit</a>
                                    <form method="post" action="{{ route('products.delete', $pd->id) }}" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">No products found</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center bg-dark text-white rounded-bottom-4">
                    <small class="text-muted">Laravel 12 Demo UI - © {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>