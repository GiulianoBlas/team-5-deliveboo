@extends('layouts.app')

@section('page-title', 'Add')

@section('main-content')

<div class="container-sm">

    <form action="{{ route('dishes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

<!-- Input nome piatto -->

    <div class="mb-3">
        <label for="inputName" class="form-label">Nome del piatto</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="inputName" name="name" 
        placeholder="Inserisci il nome del tuo piatto..." value="{{old('name')}}">
    </div>
        @error('name')
        <div class="alert alert-danger">
            {{$message}}
            @enderror
        </div>

<!-- Input ingredienti piatto -->
    
    <div class="mb-3">
        <label for="inputingredients" class="form-label">Ingredienti del piatto</label>
        <input type="text" class="form-control @error('ingredients') is-invalid @enderror" required id="inputingredients" name="ingredients" 
        placeholder="Inserisci gli ingredienti del tuo piatto..." value="{{old('ingredients')}}">
    </div>
        @error('ingredients')
        <div class="alert alert-danger">
            {{$message}}
            @enderror
        </div>

<!-- Input descrizione piatto -->

    <div class="mb-3 container-sm">
        <label for="inputDescription" class="form-label" >Descrizione del piatto</label>
        <textarea class="form-control @error('description') is-invalid @enderror" required placeholder="Inserisci la descrizione del tuo piatto.." id="inputDescription" style="height: 100px" 
        name="description">{{old('description')}}</textarea>
    </div>
        @error('description')
        <div class="alert alert-danger">
            {{$message}}
            @enderror
        </div>

<!-- Input prezzo piatto -->

    <div class="mb-3 container-sm">
        <label for="inputprice" class="form-label">Prezzo del piatto</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" required id="inputprice" name="price" min="1" max="99.99" step=".01"
        placeholder="Inserisci il prezzo del tuo piatto..." value="{{old('price')}}">
    </div>
        @error('price')
        <div class="alert alert-danger">
            {{$message}}
            @enderror
        </div>

<!-- Input immagine piatto -->

    <div class="container-sm">
      <label for="image" class="form-label" >Immagine del piatto</label>
    </div>
      <div class="input-group mb-3 container-sm">
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            @error('image')
            <div class="alert alert-danger">
            {{$message}}
            @enderror
      </div>

<!-- Radio button disponibile -->

    <div class="mb-3 container-sm">
        <label class="form-label d-block">Disponibilità</label>
        <div class="form-check form-check-inline">
            <label for="available">Disponibile</label>
            <input class="form-check-input" type="radio" name="available"
            id="available" value="1">
        </div>
        <div class="form-check form-check-inline">
            <label for="available"> Non Disponibile</label>
            <input class="form-check-input" type="radio" name="available"
            id="available" value="0">
        </div>
    </div>

<!-- Button submit Add -->

      <div class="container-sm">
      <button type="submit" class="btn btn-success">Add</button>
      </div>

    </form>
</div>

@endsection