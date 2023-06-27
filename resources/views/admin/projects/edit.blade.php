@extends('layouts.dashboard')

@section('title')
Laravel | Project Edit
@endsection

@section('content')

<h1>
    Modifica project: {{ $project->title }}
</h1>


<form action="{{ route('admin.projects.update', $project) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input type="text"
        class="form-control" name="title" id="project-title" aria-describedby="helpId" value="{{ old('title') ?? $project->title }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" name="content" id="project-content" rows="3">{{ old('content') ?? $project->content }}
      </textarea>
    </div>

    <!-- <div class="mb-3">
      <label for="" class="form-label">Slug</label>
      <input type="text"
        class="form-control" name="slug" id="project-slug" aria-describedby="helpId" placeholder="Inserisci lo slug">
    </div> -->

    <button class="btn btn-primary">
        Modifica project
    </button>

</form>


@endsection