@extends('layouts.client')

@section('title', 'Bénéficiaires')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="card px-4 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="simple-breadcrumbs">
                            <li><a href="#" style="font-size:20px">Liste des bénéficiaires</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body ps-0 pe-0">
                        <div class="table-responsive app-scroll app-datatable-default project-table">
                            <table id="projectTable" class="display table-bottom-border app-data-table table-box-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="check-box">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmark outline-secondary ms-2"></span>
                                            </label>
                                        </th>
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Genre</th>
                                        <th>Adresse</th>
                                        <th>Profession</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="check-box">
                                                <input type="checkbox">
                                                <span class="checkmark outline-secondary ms-2"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-info">
                                                    <img src="{{ asset('imgs/profil.jpg') }}" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-dark f-w-500">MOULOUNGUI</td>
                                        <td class="text-dark f-w-500">Bienvenu</td>
                                        <td class="text-dark f-w-500">14/12/1998</td>
                                        <td class="text-dark f-w-500">Monsieur</td>
                                        <td class="text-dark f-w-500">Libreville</td>
                                        <td class="text-dark f-w-500">Developpeur</td>
                                        <td class="text-dark f-w-500">mouloungui@gmail.com</td>
                                        <td class="text-dark f-w-500">060 10 40 94</td>
                                        <td class="text-dark f-w-500"><span class="badge bg-success">Principal</span></td>
                                        <td>
                                            <button type="button" class="btn btn-danger icon-btn b-r-4 delete-btn">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-success icon-btn b-r-4"
                                                data-bs-toggle="modal" data-bs-target="#editCardModal">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
