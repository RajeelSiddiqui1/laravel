@extends('layout.app')


<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-4">{{ __('welcome.heading') }}</h1>
        <p class="lead">{{ __('welcome.subheading') }}</p>
    </div>

    <div class="text-center mb-4">
        <nav class="nav justify-content-center">
            <a class="nav-link active" href="/">{{ __('welcome.home') }}</a>
            <a class="nav-link" href="/about">{{ __('welcome.about') }}</a>
        </nav>
    </div>

    <div class="text-center mb-4">
        <p class="text-muted">🌐 Current Locale: <strong>{{ app()->getLocale() }}</strong></p>
        <h4 class="mt-3">{{ __('welcome.aboutname') }}</h4>
    </div>

    <div class="text-center">
        <div class="btn-group" role="group" aria-label="Language switch">
            <a href="/setlang/en" class="btn btn-outline-primary">English</a>
            <a href="/setlang/ur" class="btn btn-outline-success">Urdu</a>
            <a href="/setlang/chi" class="btn btn-outline-danger">Chinese</a>
        </div>
    </div>
</div>

