@extends('layouts/app')

@section('content')

<div class="container mt-5">
    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Nome progetto</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Inserisci il nome del tuo progetto" value="" required>
        </div>

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Descrivi il tuo progetto" value="" required>
        </div>

        <div class="form-group mt-3">
            <label for="languages">Linguaggi di programmazione</label>
            <input type="text" name="languages" class="form-control" id="formGroupExampleInput2" placeholder="Inserisci i linguaggi che hai utilizzato" value="" required>
        </div>
        
        <div class="form-group mt-3">
            <label for="github_link">Link di Github</label>
            <input type="text" name="github_link" class="form-control" id="formGroupExampleInput2" placeholder="Allega qui il link di Github" value="" required>
        </div>

        <button class="btn btn-primary mt-3" type="submit">Salva</button>

      </form>
</div>

@endsection