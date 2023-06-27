@extends('layouts.dashboard')

@section('title')
Laravel | Project Create
@endsection

@section('content')

<h1>
    Creazione project
</h1>


<form action="{{ route('admin.projects.store') }}" method="POST">

    @csrf

    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input type="text"
        class="form-control" name="title" id="project-title" aria-describedby="helpId" placeholder="Inserisci titolo project">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" name="content" id="project-content" rows="3"></textarea>
    </div>

    <!-- <div class="mb-3">
      <label for="" class="form-label">Slug</label>
      <input type="text"
        class="form-control" name="slug" id="project-slug" aria-describedby="helpId" placeholder="Inserisci lo slug">
    </div> -->

    <button class="btn btn-primary">
        Crea project
    </button>

</form>


@endsection