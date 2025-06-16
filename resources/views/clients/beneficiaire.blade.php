@extends('layouts.client')

@section('title', 'Mon Tableau de bord')

@section('content')
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">

               		<div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb  bg-light-secondary p-3">
                        <li class="breadcrumb-item"><a href="#"><i class="ti ti-users"></i>Bénéficiaires</a>
                        </li>
                    </ol>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                                        class="ti ti-plus"></i> Enregistrer</button>
                </div>
                <style>
.modal-custom-width {
    max-width: 500px;
}

                    </style>
                <div class="modal fade" id="exampleModal" tabindex="-1"
                 aria-hidden="true">
                <div class="modal-dialog modal-custom-width"> 
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="exampleModal2">Small Modal</h1>
                            <button type="button" class="fs-5 border-0 bg-none  text-white" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="fa-solid fa-xmark fs-3"></i></button>
                        </div>
                        <div class="modal-body text-center">
<form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                        <label for="securite_sociale" class="form-label">N° sécurité sociale</label>
                        <input type="text" class="form-control" id="securite_sociale">
                        <!-- Pas de validation pour ce champ dans l'exemple -->
                    </div>

                    <div class="col-12">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" required>
                        <div class="invalid-feedback">Veuillez renseigner un nom.</div>
                    </div>

                    <div class="col-12">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" required>
                        <div class="invalid-feedback">Veuillez renseigner un prénom.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="date_naissance" class="form-label">Date naissance</label>
                        <input type="date" class="form-control" id="date_naissance">
                    </div>

                    <div class="col-md-6">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre">
                            <option selected disabled value="">Choisir...</option>
                            <option>Homme</option>
                            <option>Femme</option>
                        </select>
                    </div>

                    <!-- Section Adresse -->
                    <div class="col-12 mt-4">
                        <h5 class="form-section-title">Adresse</h5>
                    </div>
                    
                    <div class="col-md-5">
                        <label for="pays" class="form-label">Pays</label>
                        <select class="form-select" id="pays" required>
                            <option selected>Gabon</option>
                            <option>France</option>
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner un pays.</div>
                    </div>
                    
                    <div class="col-md-5">
                        <label for="ville" class="form-label">Ville</label>
                        <select class="form-select" id="ville" required>
                            <option selected>Libreville</option>
                            <option>Port-Gentil</option>
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner une ville.</div>
                    </div>
                    
                    <div class="col-md-2">
                        <label for="code_postal" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="code_postal">
                    </div>

                    <div class="col-md-4">
                        <label for="num_rue" class="form-label">N° de la rue</label>
                        <input type="text" class="form-control" id="num_rue">
                    </div>

                    <div class="col-md-8">
                        <label for="nom_rue" class="form-label">Nom rue</label>
                        <input type="text" class="form-control" id="nom_rue">
                    </div>

                    <!-- Section Contacts/Profession -->
                    <div class="col-12 mt-4">
                         <h5 class="form-section-title">Contacts/Profession</h5>
                    </div>

                    <div class="col-12">
                        <label for="profession" class="form-label">Profession</label>
                        <input type="text" class="form-control" id="profession">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                        <div class="invalid-feedback">Veuillez fournir un email valide.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="tel" class="form-label">N° Tel</label>
                        <input type="tel" class="form-control" id="tel">
                    </div>

                    <!-- Le bouton submit est généralement à la fin -->
                     <div class="col-12 mt-4">
                        <button class="btn btn-primary" type="submit">Enregistrer la fiche</button>
                    </div>

                </form>

                            <!-- <h5 class="mb-0 mt-3">Good Morning!</h5> -->
                            <!-- <p>Hi, Aaron Gish ! Congratulations.</p> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-light-primary">Save changes</button>
                        </div>
                    </div>
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
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th>Status</th>
                                    <th>Client</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden me-2">
                                                <img src="assets/images/icons/language/logo13.png" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <h6 class="f-s-15 mb-0">XD</h6>
                                                <p class="text-secondary f-s-13 mb-0">Jan 19, 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-dark f-w-500">Bette Hagenes</td>
                                    <td>
                                        <span class="badge bg-success">New</span>
                                    </td>
                                    <td>Kevin</td>
                                    <td class="text-success f-w-500">Feb 29, 2024</td>
                                    <td class="text-danger f-w-500">Mar 12, 2024</td>
                                    <td>
                                        <button type="button" class="btn btn-danger icon-btn b-r-4 delete-btn">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success icon-btn b-r-4" data-bs-toggle="modal"
                                                data-bs-target="#editCardModal">
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
