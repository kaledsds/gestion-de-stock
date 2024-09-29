@extends('layouts.app')

@section('content')
<main>

    <div class="pagetitle">
        <h1>Fournisseurs Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="p-3">
            <a href="{{ route('fournisseurs.create') }}" class="btn btn-outline-dark">Ajouter</a>

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
                                    <th>Prenom</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fournisseurs as $fournisseur)

                                <tr>
                                    <td>{{$fournisseur->id}}</td>
                                    <td>{{$fournisseur->nom}}</td>
                                    <td>{{$fournisseur->prenom}}</td>
                                    <td>{{$fournisseur->contact}}</td>
                                    <td>{{$fournisseur->email}}</td>
                                    <td>
                                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id)}}" method="post" class="btn-group"
                                            role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('fournisseurs.edit',$fournisseur->id)}}" type="button" class="btn btn-primary">
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