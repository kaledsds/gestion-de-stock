@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ajouter un nouveau fournisseur</h5>

        <!-- Multi Columns Form -->
        <form method="post" action="{{ route('fournisseurs.update', $fournisseur->id) }}" class="row g-3">
            @method('PATCH')
            @csrf
            <div class="col-md-6">
                <label for="inputName2" class="form-label">Nom:*</label>
                <input value="{{ $fournisseur->nom }}" name="nom" type="text" class="form-control" id="inputName2">
            </div>
            <div class="col-md-6">
                <label for="inputName3" class="form-label">Prenom:*</label>
                <input value="{{ $fournisseur->prenom }}" name="prenom" type="text" class="form-control" id="inputName3">
            </div>
            <div class="col-md-6">
                <label for="inputName4" class="form-label">Contact:*</label>
                <input value="{{ $fournisseur->contact }}" name="contact" type="text" class="form-control" id="inputName4">
            </div>
            <div class="col-md-6">
                <label for="inputName5" class="form-label">Email:*</label>
                <input value="{{ $fournisseur->email }}" name="email" type="email" class="form-control" id="inputName5">
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>


@endsection