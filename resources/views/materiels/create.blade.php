@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ajouter un nouveau materiel</h5>

        <!-- Multi Columns Form -->
        <form method="post" action="{{ route('materiels.store') }}" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="inputName5" class="form-label">Nom:*</label>
                <input placeholder="Nom" name="nom" type="text" class="form-control" id="inputName5">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Quantité:*</label>
                <input name="qte" type="number" class="form-control" id="inputCity">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Fournisseur:*</label>
                <select name="fourniseur_id" id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    @foreach ($fournisseurs as $fournisseur)
                    <option value="{{$fournisseur->id}}">{{ $fournisseur->nom}} {{ $fournisseur->prenom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="inputAddress5" class="form-label">Discription:*</label>
                <textarea name="discription" type="text" class="form-control" id="inputAddres5s"
                    placeholder="discription"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>


@endsection