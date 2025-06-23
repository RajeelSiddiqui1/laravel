@extends('layout.app')

<div class="container py-4">
    <h2 class="mb-4">All API Data</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($data as $item)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->body }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

