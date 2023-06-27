@extends('layouts.dashboard')

@section('title')
Laravel | Project Show
@endsection

@section('content')

<h1>
    Singolo project: {{ $project->title }}
</h1>

<p>
    {{ $project->content }}
</p>

@endsection