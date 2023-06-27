@extends('layouts.dashboard')

@section('title')
Laravel | Project Index
@endsection

@section('content')

<h1>
    Tutti i projects
</h1>

@if(Session::has('success'))
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
@endif

<a class="btn btn-primary my-3" href="{{ route('admin.projects.create') }}">Create Project</a>

<div class="table-responsive">

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">
                    id
                </th>
                <th scope="col">
                    title
                </th>
                <th scope="col">
                    slug
                </th>
                <th scope="col">
                    actions
                </th>
            </tr>
        </thead>
        
        <tbody>

            @forelse( $projects as $elem )

            <tr>
                <td scope="row">
                    {{ $elem->id }}
                </td>
                <td>
                    {{ $elem->title }}
                </td>
                <td>
                    {{ $elem->slug }}
                </td>
                <td>
                    <a href="{{ route('admin.projects.show', $elem) }}">Show</a>
                    <a href="{{ route('admin.projects.edit', $elem) }}">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $elem) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Sei sicuro di voler eliminare il project?')" type="submit" class="btn btn-danger">X</button>

                    </form>
                </td>
            </tr>

            @empty

            <h2>
                Non ci sono projects
            </h2>

            @endforelse

        </tbody>
    </table>



</div>

@endsection