@extends('layouts.client')

@section('title', 'Contrats')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="card px-4 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="simple-breadcrumbs">
                            <li><a href="#" style="font-size:20px">Liste des contrats</a></li>
                        </ul>
                        {{-- <a href="{{ route('clients.ajout') }}" type="button" class="btn btn-primary"> <i
                                class="ti ti-plus"></i> Enregistrer</a> --}}
                    </div>

                </div>
                <div class="card">
                    <div class="card-body ps-0 pe-0">
                        <div class="table-responsive app-scroll app-datatable-default project-table">
                            <table id="projectTable" class="display table-bottom-border app-data-table table-box-hover">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>
                                            <label class="check-box">
                                                <input type="checkbox" class="text-white" id="select-all">
                                                <span class="checkmark outline-secondary ms-2 text-white"></span>
                                            </label>
                                        </th>
                                        <th class="text-white">Numéro Contrat</th>
                                        <th class="text-white">Code Contrat</th>
                                        <th class="text-white">Date de Souscription</th>
                                        <th class="text-white">Date d'Échéance</th>
                                        <th class="text-white">Type de Contrat</th>
                                        <th class="text-white">Statut</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Nom Assureur</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($contrats) && is_array($contrats) && count($contrats) > 0)
                                        @foreach ($contrats as $contrat)
                                        <tr>
                                            <td class="bg-light">
                                                <label class="check-box">
                                                    <input type="checkbox">
                                                    <span class="checkmark outline-dark ms-2"></span>
                                                </label>
                                            </td>
                                            <td class="text-dark f-w-500">{{ $contrat['numero_contrat'] }}</td>
                                            <td class="text-dark f-w-500">{{ $contrat['code_contrat'] }}</td>
                                            <td class="text-dark f-w-500">
                                                {{ \Carbon\Carbon::parse($contrat['date_souscription'])->format('d/m/Y') }}
                                            </td>
                                            <td class="text-dark f-w-500">
                                                {{ \Carbon\Carbon::parse($contrat['date_echeance'])->format('d/m/Y') }}</td>
                                            <td class="text-dark f-w-500">{{ $contrat['type_contrat'] }}</td>
                                            <td class="text-dark f-w-500">
                                                <span class="badge bg-success">{{ $contrat['statut'] }}</span>
                                            </td>
                                            <td class="text-dark f-w-500">{{ $contrat['description'] }}</td>
                                            <td class="text-dark f-w-500">{{ $contrat['nom_assureur'] }}</td>
                                            <td>
                                                <a href="{{ route('client.contratsDetails', ['contrat' => $contrat['id']]) }}"
                                                    class="btn-action btn btn-light-primary active" data-loader-target="{{ $contrat['id'] }}">
                                                    <i class="ti ti-eye"></i> Détails
                                                </a>
                                                <button class="btn btn-light-primary d-inline-flex-center" id="{{ $contrat['id'] }}" type="button"  style="display: none;" disabled>
                                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                                        aria-hidden="true"></span>
                                                    ...
                                                </button>
                                            </td>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">Aucun contrat disponible.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
