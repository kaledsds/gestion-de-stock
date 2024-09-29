@extends('layouts.app')

@section('content')
<main>

    <div class="pagetitle">
        <h1>Materiels Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="p-3">
            <a href="{{ route('materiels.create') }}" class="btn btn-outline-dark">Ajouter</a>

        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>I</b>d
                                    </th>
                                    <th>Nom</th>
                                    <th>Fourniseur</th>
                                    <th>Quantité</th>
                                    <th>Discription</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materiels as $materiel)

                                <tr>
                                    <td>{{$materiel->id}}</td>
                                    <td>{{$materiel->nom}}</td>
                                    <td>{{$materiel->fourniseur_nom}} {{$materiel->fourniseur_prenom}}</td>
                                    <td>{{$materiel->qte}}</td>
                                    <td>{{$materiel->discription}}</td>
                                    <td>
                                        <form action="{{ route('materiels.destroy', $materiel->id)}}" method="post" class="btn-group"
                                            role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('materiels.edit',$materiel->id)}}" type="button" class="btn btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>


@endsection