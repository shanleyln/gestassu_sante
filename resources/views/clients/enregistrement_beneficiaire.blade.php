@extends('layouts.client')

@section('title', 'Mon Tableau de bord')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="card px-4 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="simple-breadcrumbs">
                            <li><a href="{{ route('client.contrats') }}" style="font-size:20px">Liste des contrats</a></li>
                            <li><a href="{{ route('client.contratsDetails', ['contrat' => $contrat_id]) }}" class="active"
                                    style="font-size:20px">Détails du contrats</a></li>
                            <li><a href="{{ route('client.policeDetails', ['police' => $police['id']]) }}" class="active"
                                    style="font-size:20px">Détails de police</a></li>
                            <li><a href="#" style="font-size:20px">Enregistrement des bénéficiaires</a></li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <!-- Infos contrat -->
                        <div class="bg-light border rounded p-3 mb-3">
                            <h6 class="bgPrimary py-2 px-2 rounded">Informations du contrat</h6>
                            <p class="textPrimary"><strong>N° Contrat :</strong>
                                {{ $contrat['numero_contrat'] ?? '------' }}</p>
                            <p class="textPrimary"><strong>Souscripteur :</strong>
                                {{ $contrat['nom_souscripteur'] ?? '------' }}
                            </p>
                            <p class="textPrimary"><strong>Date échéance :</strong>
                                {{ !empty($contrat['date_echeance']) ? \Carbon\Carbon::parse($contrat['date_echeance'])->format('d/m/Y') : '------' }}
                            </p>

                        </div>

                        <!-- Infos police -->
                        <div class="bg-light border rounded p-3 mb-3">
                            <h6 class="bgPrimary  py-2 px-2 rounded">Informations de la police</h6>
                            <p class="textPrimary"><strong>Nom Police :</strong> {{ $police['nom_police'] ?? '------' }}</p>
                            <p class="textPrimary"><strong>Type personnel :</strong>
                                {{ $police['type_personnel'] ?? '------' }}</p>
                            <p class="textPrimary"><strong>Date effet :</strong>
                                {{ !empty($police['date_debut']) ? \Carbon\Carbon::parse($police['date_debut'])->format('d/m/Y') : '------' }}
                            </p>
                            <p class="textPrimary"><strong>Date échéance :</strong>
                                {{ !empty($police['date_fin']) ? \Carbon\Carbon::parse($police['date_fin'])->format('d/m/Y') : '------' }}
                            </p>
                            <p class="textPrimary"><strong>Tarif :</strong> {{ $police['tarif'] ?? 0 }}</p>
                        </div>

                        <!-- Statistiques -->
                        <div class="bg-light border rounded p-3">
                            <h6 class="bgPrimary text-white py-2 px-2 rounded">Statistiques</h6>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="border rounded textPrimary py-2">
                                        <small>Total Bénéf.</small><br>
                                        <strong>{{ $police['total_beneficiaires'] ?? 0 }}</strong>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border rounded textPrimary py-2">
                                        <small>Principaux</small><br>
                                        <strong>{{ $police['total_assures_principaux'] ?? 0 }}</strong>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border rounded textPrimary py-2">
                                        <small>Affilié</small><br>
                                        <strong>{{ $police['total_affilies'] ?? 0 }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" style="">
                        <div class="mb-2">
                            <h4 class="mb-3">Formulaire des bénéficiaires</h4>
                            <!-- Le formulaire principal -->
                            <form class="app-form row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('client.beneficiare.save') }}">
                                @csrf
                                <input type="hidden" name="police_id" value="{{ $police['id'] }}">
                                <!-- Conteneur pour tous les bénéficiaires -->
                                <div id="beneficiaires-container" style="max-height: 550px; overflow-y: auto;">

                                    <!-- ===== Bénéficiaire Principal (Index 0) ===== -->
                                    <div class="beneficiaire-block card p-4 shadow" data-index="0">
                                        <div class="card p-3 shadow">
                                            <h5>Bénéficiaire Principal</h5>
                                            @if ($errors->any())
                                                <div class="alert alert-light-border-danger d-flex align-items-center justify-content-between"
                                                    role="alert">
                                                    <p class="mb-0 text-danger">
                                                        <i class="ti ti-alert-circle f-s-18 me-2"></i>
                                                        {{ $errors->first() }}
                                                    </p>
                                                    <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                    <div
                                                        class="alert alert-light-border-success d-flex align-items-center justify-content-between">
                                                        <p class="mb-0 text-success">
                                                            <i class="ti ti-circle-check f-s-18 me-2"></i>
                                                            {{ session('message') ?? session('success') }}
                                                        </p>
                                                        <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                                    </div>
                                                @endif
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom01_0" class="form-label">Nom(s)</label>
                                                <input type="text" class="form-control" name="beneficiaires[0][nom]"
                                                    id="validationCustom01_0" required>
                                                <div class="invalid-feedback">Le nom est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom02_0" class="form-label">Prénom(s)</label>
                                                <input type="text" class="form-control" name="beneficiaires[0][prenom]"
                                                    id="validationCustom02_0" required>
                                                <div class="invalid-feedback">Le prénom est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername_0" class="form-label">Date de
                                                    naissance</label>
                                                <input type="date" class="form-control"
                                                    name="beneficiaires[0][date_naissance]" id="validationCustomUsername_0"
                                                    required>
                                                <div class="invalid-feedback">La date de naissance est obligatoire.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom04_0" class="form-label">Genre</label>
                                                <select class="form-select" id="validationCustom04_0"
                                                    name="beneficiaires[0][genre]" required>
                                                    <option selected disabled value="">Sélectionnez le genre...
                                                    </option>
                                                    <option value="Masculin">Monsieur</option>
                                                    <option value="Feminin">Madame</option>
                                                </select>
                                                <div class="invalid-feedback">Le genre est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom05_0" class="form-label">Lien avec
                                                    l'assuré</label>
                                                <select class="form-select" id="validationCustom05_0"
                                                    name="beneficiaires[0][lien_avec_assure]" required>
                                                    <option selected value="Principal">Principal
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Le genre est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom03_0" class="form-label">Adresse</label>
                                                <input type="text" class="form-control"
                                                    name="beneficiaires[0][nom_rue]" id="validationCustom03_0" required>
                                                <div class="invalid-feedback">L'adresse est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom06_0" class="form-label">Profession</label>
                                                <input type="text" class="form-control"
                                                    name="beneficiaires[0][profession]" id="validationCustom06_0"
                                                    required>
                                                <div class="invalid-feedback">La profession est obligatoire.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email_0" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="beneficiaires[0][email]"
                                                    id="email_0" data-ignore-validation>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telephone_0" class="form-label">Téléphone</label>
                                                <input type="text" class="form-control"
                                                    name="beneficiaires[0][telephone]" id="telephone_0" data-ignore-validation>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    <!-- Les nouveaux bénéficiaires seront insérés ici -->
                                    <!-- ===== TEMPLATE pour les nouveaux bénéficiaires (invisible) ===== -->
                                    <template id="beneficiaire-template">
                                        <!-- On ajoute la classe "affilie-block" ici -->
                                        <div class="beneficiaire-block affilie-block card p-4 shadow"
                                            data-index="__INDEX__">
                                            <div class="card p-3 shadow">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5>Bénéficiaire Affilié N° : <span
                                                            class="beneficiaire-num">__NUM__</span>
                                                    </h5>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-beneficiaire-btn">Supprimer</button>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label for="validationCustom01___INDEX__"
                                                        class="form-label">Nom(s)</label>
                                                    <input type="text" class="form-control"
                                                        name="beneficiaires[__INDEX__][nom]"
                                                        id="validationCustom01___INDEX__" required>
                                                    <div class="invalid-feedback">Le nom est obligatoire.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02___INDEX__"
                                                        class="form-label">Prénom(s)</label>
                                                    <input type="text" class="form-control"
                                                        name="beneficiaires[__INDEX__][prenom]"
                                                        id="validationCustom02___INDEX__" required>
                                                    <div class="invalid-feedback">Le prénom est obligatoire.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustomUsername___INDEX__"
                                                        class="form-label">Date de
                                                        naissance</label>
                                                    <input type="date" class="form-control"
                                                        name="beneficiaires[__INDEX__][date_naissance]"
                                                        id="validationCustomUsername___INDEX__" required>
                                                    <div class="invalid-feedback">La date de naissance est obligatoire.
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom04___INDEX__"
                                                        class="form-label">Genre</label>
                                                    <select class="form-select" id="validationCustom04___INDEX__"
                                                        name="beneficiaires[__INDEX__][genre]" required>
                                                        <option selected disabled value="">Sélectionnez le genre...
                                                        </option>
                                                        <option value="Masculin">Monsieur</option>
                                                        <option value="Feminin">Madame</option>
                                                    </select>
                                                    <div class="invalid-feedback">Le genre est obligatoire.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom05___INDEX__" class="form-label">Lien avec
                                                        l'assuré</label>
                                                    <select class="form-select" id="validationCustom05___INDEX__"
                                                        name="beneficiaires[__INDEX__][lien_avec_assure]" required>
                                                        <option selected disabled value="">Sélectionnez le lien...
                                                        </option>
                                                        <option value="Conjoint">Conjoint</option>
                                                        <option value="Enfant">Enfant</option>
                                                    </select>
                                                    <div class="invalid-feedback">Le Lien avec l'assuré est obligatoire.
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom03___INDEX__"
                                                        class="form-label">Adresse</label>
                                                    <input type="text" class="form-control"
                                                        name="beneficiaires[__INDEX__][nom_rue]"
                                                        id="validationCustom03___INDEX__" required>
                                                    <div class="invalid-feedback">L'adresse est obligatoire.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom06___INDEX__"
                                                        class="form-label">Profession</label>
                                                    <input type="text" class="form-control"
                                                        name="beneficiaires[__INDEX__][profession]"
                                                        id="validationCustom06___INDEX__" required>
                                                    <div class="invalid-feedback">La profession est obligatoire.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email___INDEX__" class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        name="beneficiaires[__INDEX__][email]" id="email___INDEX__" data-ignore-validation>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="telephone___INDEX__" class="form-label">Téléphone</label>
                                                    <input type="text" class="form-control"
                                                        name="beneficiaires[__INDEX__][telephone]"
                                                        id="telephone___INDEX__" data-ignore-validation>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- ===== Boutons d'action globaux ===== -->
                                <div class="col-12">
                                    <div class="card p-3 shadow">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button class="btn btn-dark shadow" type="button"
                                                id="add-beneficiaire-btn">Nouveau
                                                bénéficiaire affilié</button>
                                            <button class="btn-action btn btn-primary shadow" data-loader-target="envoibeneficiaire" type="submit" style="background-color:#5e2d17">Enregistrer tous les
                                                bénéficiaires</button>
                                                <button class="btn btn-light-primary d-inline-flex-center" id="envoibeneficiaire" type="button"  style="display: none;" disabled>
                                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                                        aria-hidden="true"></span>
                                                   Enregistrement en cours ...
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
   <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.needs-validation');
    const submitBtn = form.querySelector('.btn-action');

    function validateFormFields() {
        const beneficiaireBlocks = form.querySelectorAll('.beneficiaire-block');
        let allBlocksValid = true;

        beneficiaireBlocks.forEach(block => {
            // ✅ Ne sélectionne que les champs avec l'attribut "required"
            const requiredFields = block.querySelectorAll('input[required], select[required], textarea[required]');
            
            for (let field of requiredFields) {
                if (!field.offsetParent) continue; // Ignore les champs cachés
                if (!field.value || (field.tagName === 'SELECT' && field.value === '')) {
                    allBlocksValid = false;
                    break;
                }
            }
        });

        submitBtn.disabled = !allBlocksValid;
    }

    // Vérification initiale
    validateFormFields();

    // Observer les ajouts dynamiques
    const observer = new MutationObserver(validateFormFields);
    observer.observe(document.getElementById('beneficiaires-container'), {
        childList: true,
        subtree: true
    });

    // Réagir aux changements
    form.addEventListener('input', validateFormFields);
    form.addEventListener('change', validateFormFields);
});
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const addButton = document.getElementById('add-beneficiaire-btn');
            const container = document.getElementById('beneficiaires-container');
            const template = document.getElementById('beneficiaire-template');

            let beneficiaireIndex = 1;

            // ===== FONCTION POUR AJOUTER UN BÉNÉFICIAIRE (inchangée) =====
            addButton.addEventListener('click', function() {
                const clone = template.content.cloneNode(true);

                const newHtml = clone.firstElementChild.outerHTML
                    .replace(/__INDEX__/g, beneficiaireIndex)
                    .replace(/__NUM__/g, beneficiaireIndex);

                const newBlock = document.createElement('div');
                newBlock.innerHTML = newHtml;

                container.appendChild(newBlock.firstElementChild);

                beneficiaireIndex++;
            });

            // ===== FONCTION POUR GÉRER LA SUPPRESSION (inchangée) =====
            container.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-beneficiaire-btn')) {
                    e.target.closest('.beneficiaire-block').remove();

                    // On appelle toujours la ré-indexation après suppression
                    reindexBeneficiaires();
                }
            });

            // =========================================================================
            // ===== NOUVELLE FONCTION DE RÉ-INDEXATION (CORRIGÉE ET ROBUSTE) =====
            // =========================================================================
            function reindexBeneficiaires() {
                // CORRECTION CLÉ : On sélectionne UNIQUEMENT les blocs affiliés grâce à la nouvelle classe.
                const affiliateBlocks = container.querySelectorAll('.affilie-block');

                // La logique de la boucle reste la même, mais elle s'applique maintenant au bon ensemble d'éléments.
                affiliateBlocks.forEach((block, loopIndex) => {
                    // Le nouvel index pour les affiliés commence à 1.
                    const newIndex = loopIndex + 1;

                    // On récupère l'ancien index pour savoir quoi remplacer.
                    const oldIndex = parseInt(block.dataset.index);

                    // Si l'index est déjà correct, on passe au suivant.
                    if (oldIndex === newIndex) {
                        return;
                    }

                    // 1. Mettre à jour le numéro dans le titre (ex: "Bénéficiaire Affilié #4" -> "#3").
                    block.querySelector('.beneficiaire-num').textContent = newIndex;

                    // 2. Mettre à jour l'attribut data-index du bloc.
                    block.dataset.index = newIndex;

                    // 3. Mettre à jour tous les attributs (name, id, for) à l'intérieur du bloc.
                    // On utilise des expressions régulières pour être sûr de bien tout remplacer.
                    const elementsToUpdate = block.querySelectorAll('[name], [id], [for]');
                    elementsToUpdate.forEach(el => {
                        if (el.name) {
                            el.name = el.name.replace(`[${oldIndex}]`, `[${newIndex}]`);
                        }
                        if (el.id) {
                            el.id = el.id.replace(`_${oldIndex}`, `_${newIndex}`);
                        }
                        if (el.htmlFor) {
                            el.htmlFor = el.htmlFor.replace(`_${oldIndex}`, `_${newIndex}`);
                        }
                    });
                });

                // 4. Mettre à jour le compteur global pour que le prochain ajout ait le bon numéro.
                beneficiaireIndex = affiliateBlocks.length + 1;
            }

            // Script de validation Bootstrap
            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        });
    </script>
@endsection
