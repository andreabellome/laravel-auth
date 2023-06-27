@extends('layouts.dashboard')

@section('title')
Laravel | Project Index
@endsection

@section('content')

<h1>
    Tutti i projects
</h1>

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