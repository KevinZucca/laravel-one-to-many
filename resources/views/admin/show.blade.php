@extends('layouts/app')

@section('content')

  <div class="container text-center mt-5">
      <div class="container project-details">
        <h1>{{$project->name}}</h1>
        <p>{{$project->description}}</p>
        <em>Linguaggi utilizzati:  <strong>{{$project->languages}}</strong> </em>
        <a href="{{route('admin.projects.edit', $project->id)}}">Modifica progetto</a>
    </div>
    <a href="{{route('admin.projects.index')}}">Ritorna ai progetti</a>
  </div>


@endsection