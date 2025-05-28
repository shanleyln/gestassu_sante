@if (\Illuminate\Support\Facades\Auth::guard('api_user')->user() && \Illuminate\Support\Facades\Auth::guard('api_user')->user()->type == "ASSUREUR")
    @extends('layouts.assureur')
@else
    @extends('layouts.prestataire')
@endif

@section('content')
    <style>
        /* Inspiration Charte Ingenium Assurance */
        /* Couleurs (à ajuster si nuances exactes connues) */
        :root {
            /* --ingenium-primary2-blue: ; */
            /* Un bleu marine profond, souvent vu */
            --ingenium-secondary-gold: #C68E17;
            /* Un doré/bronze pour les accents, comme le logo aigle */
            --ingenium-text-dark: #333333;
            --ingenium-text-light: #f8f9fa;
            --ingenium-background-light: #f8f9fa;
            --ingenium-border-color: #dee2e6;
            --ingenium-hover2-blue: #5e2d17;
            /* Un bleu plus clair pour les survols */
        }

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap');



        .container {
            width: 80%;
            max-width: 1100px;
            border-radius: 10px;
            margin: 0 auto;
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px dashed var(--ingenium-border-color);
        }

        section:last-of-type {
            border-bottom: none;
        }

        h2,
        h3,
        h4 {
            font-family: 'Montserrat', sans-serif;
            color: var(--ingenium-primary2-blue);
            font-weight: 600;
        }

        h2 {
            font-size: 1.8em;
            margin-top: 0;
            /* Pour les H2 en début de section */
            border-bottom: 2px solid var(--ingenium-secondary-gold);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 1.4em;
            color: var(--ingenium-primary2-blue);
            /* Légèrement plus clair ou même couleur */
            margin-top: 25px;
            margin-bottom: 15px;
        }

        h4 {
            font-size: 1.1em;
            color: var(--ingenium-text-dark);
            font-weight: 600;
        }

        p {
            margin-bottom: 15px;
            text-align: justify;
        }


        strong {
            font-weight: 600;
            color: var(--ingenium-primary2-blue);
        }

        code,
        .code-block {
            background-color: #e9ecef;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', Courier, monospace;
            color: #c60000;
            /* Rouge pour le code */
        }

        .code-block {
            display: block;
            padding: 10px;
            margin: 10px 0;
            white-space: pre-wrap;
            /* Pour que les longs SMS aillent à la ligne */
        }

        .scenario {
            background-color: #eef7ff;
            /* Un bleu très clair */
            border-left: 4px solid var(--ingenium-hover2-blue);
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }

        .scenario h4 {
            color: var(--ingenium-hover2-blue);
            margin-top: 0;
        }

        .image-placeholder {
            border: 2px dashed var(--ingenium-border-color);
            padding: 40px;
            text-align: center;
            background-color: var(--ingenium-background-light);
            margin: 20px 0;
            color: #6c757d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid var(--ingenium-border-color);
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: var(--ingenium-primary2-blue);
            color: var(--ingenium-text-light);
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <!-- Contenu du Dashboard -->
    <div class="container">
        <div class="breadcrumb-custom mb-3">
            <h4 class="pt-2">
                <a href="#" class="breadcrumb-link1">Guide Utilisateur – Plateforme Ingenium Santé</a>
            </h4>
        </div>
        <style>
            nav.toc1 {
                background-color: var(--ingenium-background-light);
                padding: 15px;
                margin-bottom: 30px;
                border-radius: 5px;
                border: 1px solid var(--ingenium-border-color);
            }

            nav.toc1 h2 {
                font-family: 'Montserrat', sans-serif;
                color: var(--ingenium-primary2-blue);
                margin-top: 0;
                font-size: 1.5em;
            }

            nav.toc1 ol {
                list-style: decimal;
                padding-left: 20px;
            }

            nav.toc1 ol li {
                margin-bottom: 8px;
            }

            nav.toc1 ol li a {
                text-decoration: none;
                color: var(--ingenium-primary2-blue);
                font-weight: 600;
            }

            nav.toc1 ol li a:hover {
                color: var(--ingenium-hover2-blue);
                text-decoration: underline;
            }

            ul,
            ol {
                margin-bottom: 15px;
                padding-left: 30px;
                /* Indentation standard pour listes */
            }
        </style>
        <nav class="toc1 shadow" style="color: #3e1b0f">
            <h2 style="color: #3e1b0f">Table des Matières</h2>
            <ol>
                <li><a href="#introduction">Introduction</a></li>
                <li><a href="#presentation-plateforme">Présentation de la plateforme Ingenium Santé</a></li>
                <li><a href="#creation-comptes">Création et configuration des comptes prestataires</a></li>
                <li><a href="#gestion-acces">Gestion des accès utilisateurs (rôles, permissions)</a></li>
                <li><a href="#parcours-client">Parcours client : Vérification des droits</a></li>
                <li><a href="#elements-carte">Explication des éléments de la carte santé Ingenium</a></li>
                <li><a href="#utilisation-web">Utilisation de la plateforme web pas à pas</a></li>
                <li><a href="#utilisation-sms">Utilisation du canal SMS</a></li>
                <li><a href="#securite-bonnes-pratiques">Recommandations de sécurité et bonnes pratiques</a></li>
                <li><a href="#faq">Foire aux questions (FAQ)</a></li>
            </ol>
        </nav>

        <main class="bg-white p-3 rounded shadow">
            <section id="introduction">
                <h2 style="color: #3e1b0f">1. Introduction</h2>
                <h3 style="color: #3e1b0f">Bienvenue sur Ingenium Santé</h3>
                <p>Bienvenue dans le guide utilisateur de la plateforme Ingenium Santé, développée par Ingenium Assurance
                    (<a href="http://www.ingenium-assurance.com" target="_blank">www.ingenium-assurance.com</a>). Ce guide a
                    été conçu pour vous accompagner dans la découverte et l'utilisation optimale de notre solution digitale,
                    pensée pour simplifier et sécuriser la gestion des prises en charge santé.</p>

                <h3 style="color: #3e1b0f">À qui s'adresse ce guide ?</h3>
                <p>Ce document s'adresse principalement :</p>
                <ul>
                    <li>Aux <strong>prestataires de santé</strong> (hôpitaux, cliniques, pharmacies, laboratoires,
                        médecins).</li>
                    <li>Aux <strong>administrateurs de centres de soins</strong> responsables de la configuration et de la
                        gestion des accès.</li>
                    <li>Aux <strong>utilisateurs finaux (bénéficiaires)</strong> souhaitant comprendre le fonctionnement de
                        leur carte et les informations qu'elle contient.</li>
                </ul>

                <h3 style="color: #3e1b0f">Objectifs de la plateforme</h3>
                <p>Ingenium Santé vise à :</p>
                <ul>
                    <li><strong>Faciliter</strong> la vérification en temps réel de la validité des cartes santé.</li>
                    <li><strong>Accélérer</strong> l'accès aux informations sur les garanties et l'état des polices
                        d'assurance.</li>
                    <li><strong>Réduire</strong> les risques d'erreurs et de fraudes.</li>
                    <li><strong>Assurer</strong> la continuité du service même en cas de coupure Internet grâce à un canal
                        SMS.</li>
                </ul>
            </section>

            <section id="presentation-plateforme">
                <h2 style="color: #3e1b0f">2. Présentation de la plateforme Ingenium Santé</h2>
                <h3 style="color: #3e1b0f">Qu'est-ce qu'Ingenium Santé ?</h3>
                <p>Ingenium Santé est une plateforme digitale innovante qui connecte les assurés, les entreprises clientes,
                    les assureurs et les prestataires de santé. Elle permet une gestion dématérialisée et instantanée des
                    informations relatives aux couvertures santé.</p>

                <h3 style="color: #3e1b0f">Avantages pour les prestataires de santé</h3>
                <ul>
                    <li>Vérification instantanée de l'éligibilité des patients.</li>
                    <li>Accès clair et rapide aux détails de la couverture.</li>
                    <li>Réduction du temps administratif.</li>
                    <li>Diminution des impayés liés à des cartes non valides ou des garanties insuffisantes.</li>
                </ul>

                <h3 style="color: #3e1b0f">Avantages pour les administrateurs de centres de soins</h3>
                <ul>
                    <li>Gestion centralisée des accès pour le personnel du centre.</li>
                    <li>Contrôle précis des permissions utilisateurs.</li>
                    <li>Traçabilité des vérifications effectuées.</li>
                </ul>

                <h3 style="color: #3e1b0f">Avantages pour les bénéficiaires</h3>
                <ul>
                    <li>Prise en charge simplifiée et accélérée chez les prestataires.</li>
                    <li>Clarté sur leurs droits et garanties.</li>
                    <li>Sécurité accrue grâce à un système de vérification robuste.</li>
                </ul>
            </section>

            <section id="creation-comptes">
                <h2 style="color: #3e1b0f">3. Création et configuration des comptes prestataires</h2>
                <h3 style="color: #3e1b0f">Réception de vos identifiants</h3>
                <p>Chaque centre de soins partenaire recevra de la part d'Ingenium Assurance :</p>
                <ul>
                    <li>Un <strong>Identifiant Centre</strong> unique.</li>
                    <li>Un <strong>Code Administrateur</strong> initial.</li>
                </ul>
                <p>Ces informations sont confidentielles et cruciales pour la première connexion.</p>

                <h3 style="color: #3e1b0f">Première connexion et configuration initiale</h3>
                <ol>
                    <li>Rendez-vous sur le portail web Ingenium Santé (l'URL vous sera communiquée).</li>
                    <li>Utilisez votre Identifiant Centre et votre Code Administrateur pour vous connecter.</li>
                    <li>Il vous sera probablement demandé de personnaliser votre mot de passe administrateur dès la première
                        connexion pour des raisons de sécurité.</li>
                </ol>
                <!-- <div class="image-placeholder">Placez ici un schéma simple du processus de première connexion</div> -->


                <h3 style="color: #3e1b0f">Modification du mot de passe administrateur</h3>
                <p>Il est recommandé de changer régulièrement votre mot de passe administrateur. Cette option est
                    généralement disponible dans les paramètres de votre compte sur la plateforme.</p>
            </section>

            <section id="gestion-acces">
                <h2 style="color: #3e1b0f">4. Gestion des accès utilisateurs (rôles, permissions)</h2>
                <h3 style="color: #3e1b0f">Rôle de l'administrateur du centre</h3>
                <p>L'administrateur désigné pour votre centre de soins est responsable de :</p>
                <ul>
                    <li>La création des comptes pour les membres du personnel habilités à utiliser la plateforme (ex:
                        réception, facturation).</li>
                    <li>L'attribution des rôles et des permissions spécifiques à chaque utilisateur.</li>
                    <li>La mise à jour et la suppression des comptes utilisateurs (départ d'un employé, changement de
                        fonction).</li>
                </ul>

                <h3 style="color: #3e1b0f">Création de comptes utilisateurs pour le personnel</h3>
                <p>Depuis l'interface d'administration de la plateforme :</p>
                <ol>
                    <li>Accédez à la section "Gestion des utilisateurs" ou équivalent.</li>
                    <li>Cliquez sur "Ajouter un utilisateur".</li>
                    <li>Remplissez les informations requises (nom, prénom, identifiant souhaité, etc.).</li>
                    <li>Attribuez un mot de passe temporaire que l'utilisateur devra changer.</li>
                </ol>

                <h3 style="color: #3e1b0f">Attribution des rôles et permissions</h3>
                <p>La plateforme peut proposer différents rôles prédéfinis (ex: "Agent de vérification", "Superviseur") avec
                    des niveaux d'accès distincts. Vous pourrez :</p>
                <ul>
                    <li>Assigner un rôle à chaque utilisateur.</li>
                    <li>Personnaliser les permissions si la plateforme le permet (ex: consultation seule, droit de
                        modification, etc.).</li>
                </ul>

                <h3 style="color: #3e1b0f">Modification et suppression des utilisateurs</h3>
                <p>Maintenez à jour la liste des utilisateurs pour garantir la sécurité et la pertinence des accès.
                    Supprimez les comptes des employés ne faisant plus partie de votre structure.</p>
                <!-- <div class="image-placeholder">Placez ici un organigramme simple montrant l'Administrateur Centre et les Utilisateurs avec leurs rôles.</div> -->
            </section>

            <section id="parcours-client">
                <h2 style="color: #3e1b0f">5. Parcours client : Vérification des droits</h2>
                <h3 style="color: #3e1b0f">5.1 Cas normal : Vérification via la plateforme web</h3>
                <div class="scenario">
                    <h4>Scénario :</h4>
                    <p>Un patient, Mme. ELANIE NDONG Steffy Rochelene, se présente à la réception de votre clinique avec sa
                        carte santé Ingenium.</p>
                </div>
                <ol>
                    <li>L'agent de réception se connecte à la plateforme Ingenium Santé avec ses identifiants.</li>
                    <li>Il accède à la fonction "Vérifier une carte" ou "Consulter droits".</li>
                    <li>Il saisit le <strong>Numéro d'identification unique</strong> présent sur la carte de Mme. ELANIE
                        NDONG Steffy Rochelene .</li>
                    <li>La plateforme affiche en temps réel :
                        <ul>
                            <li>La validité de la carte.</li>
                            <li>Le nom du bénéficiaire et de l'assuré principal (si différent).</li>
                            <li>Les garanties couvertes (ex: "100% Ambulatoires - 100% Hospitalisations").</li>
                            <li>La zone de couverture (ex: "Afrique UE").</li>
                            <li>L'état de la police d'assurance (active, suspendue, expirée).</li>
                        </ul>
                    </li>
                    <li>L'agent peut alors informer Mme. ELANIE NDONG Steffy Rochelene de sa prise en charge et procéder aux
                        soins.</li>
                </ol>

                <h3 style="color: #3e1b0f">5.2 Cas d'exception : Vérification par SMS (sans accès Internet)</h3>
                <div class="scenario">
                    <h4>Scénario :</h4>
                    <p>Une coupure Internet survient dans votre centre, et Mme. Traoré doit faire vérifier sa carte.</p>
                </div>
                <ol>
                    <li>L'agent de réception utilise un téléphone mobile.</li>
                    <li>Il envoie un SMS à un numéro dédié fourni par Ingenium Assurance (ex: <code>+XXX XXXXXXXX</code>).
                    </li>
                    <li>Le SMS doit contenir des informations clés dans un format précis (voir section 8). Par exemple :
                        <code class="code-block">VERIF [Numéro d'identification unique de la carte] [Votre Identifiant
                            Centre]</code>
                    </li>
                    <li>En quelques secondes, il reçoit un SMS en retour avec les informations essentielles sur la validité
                        et les droits du patient.</li>
                    <li>Mme. Traoré peut être prise en charge.</li>
                </ol>
            </section>

            <section id="elements-carte">
                <h2 style="color: #3e1b0f">6. Explication des éléments de la carte santé Ingenium</h2>
                <p>Basé sur une carte santé type Ingenium, voici les éléments que vous y trouverez :</p>

                <div class="row py-3">
                    <div class="col-md-6">
                        <img src="{{ asset('imgs/4.png') }}" class="rounded" alt="" width="500"
                            style="box-shadow: 0 4px 20px rgba(94, 45, 23, 0.5);">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('imgs/5.png') }}" class="rounded" alt="" width="500"
                            style="box-shadow: 0 4px 20px rgba(94, 45, 23, 0.5);">
                    </div>
                </div>

                <ol>
                    <li><strong>Logo Ingenium Assurance (Courtier)</strong> : Représente la société de courtage Ingenium
                        Assurance. Souvent visible en plusieurs endroits.</li>
                    <li><strong>Titre de la Carte</strong> : Indication claire "CARTE SANTÉ".</li>
                    <li><strong>Logo de l'Assureur</strong> : Indique la compagnie d'assurance qui porte le risque (ex: NSIA
                        ASSURANCES).</li>
                    <li><strong>Nom du Bénéficiaire</strong> : La personne autorisée à utiliser la carte pour les soins.
                    </li>
                    <li><strong>Entreprise Cliente / Groupe d'Appartenance</strong> : Code ou nom de l'entreprise de
                        l'assuré principal.</li>
                    <li><strong>Détails de la Couverture</strong> : Taux de prise en charge (ex: "100% Ambulatoires - 100%
                        Hospitalisations").</li>
                    <li><strong>Zone de Couverture Géographique</strong> : Lieux où la carte est valable (ex: "Afrique UE").
                    </li>
                    <li><strong>Numéro d'Identification Unique</strong> : Élément clé pour toute vérification (ex:
                        "GB-A1-A125-01-0001-QDW4-5"). C'est ce numéro qui sera saisi sur la plateforme web ou envoyé par
                        SMS.</li>
                    <li><strong>Éléments Graphiques</strong> : Design spécifique à Ingenium Assurance.</li>
                </ol>
            </section>

            <section id="utilisation-web">
                <h2 style="color: #3e1b0f">7. Utilisation de la plateforme web pas à pas</h2>
                <h3 style="color: #3e1b0f">Accès à la plateforme</h3>
                <ol>
                    <li>Ouvrez votre navigateur web (Chrome, Firefox, Edge recommandé).</li>
                    <li>Saisissez l'adresse du portail Ingenium Santé (ex: <code>sante.ingenium-assurance.com</code> - l'URL
                        exacte vous sera communiquée).</li>
                        {{-- <li>Saisissez l'adresse du portail Ingenium Santé (ex: <code><a href="https://ingenium-sante.com">https://ingenium-sante.com</a></code>).</li> --}}
                    <li>Entrez votre Identifiant Centre (ou identifiant utilisateur) et votre mot de passe.</li>
                    <li>Cliquez sur "Connexion".</li>
                </ol>
                <!-- <div class="image-placeholder">Placez ici une capture de l'écran de connexion.</div> -->

                <h3 style="color: #3e1b0f">Tableau de bord (si applicable)</h3>
                <p>Après connexion, vous pourriez arriver sur un tableau de bord présentant des informations générales, des
                    raccourcis vers les fonctionnalités les plus utilisées ou des notifications.</p>

                <h3 style="color: #3e1b0f">Vérification d'une carte santé</h3>
                <ol>
                    <li>Repérez le menu ou le bouton "Vérifier Carte", "Rechercher Bénéficiaire" ou une appellation
                        similaire.</li>
                    <li>Un champ de saisie apparaîtra, vous invitant à entrer le "Numéro d'identification unique" de la
                        carte.</li>
                    <li>Saisissez soigneusement le numéro (ex: <code>GB-A1-A125-01-0001-QDW4-5</code>).</li>
                    <li>Cliquez sur "Vérifier" ou "Rechercher".</li>
                </ol>
                <!-- <div class="image-placeholder">Placez ici une capture d'écran du champ de saisie du numéro de carte.</div> -->

                <h3 style="color: #3e1b0f">Consultation des garanties et de l'état de la police</h3>
                <p>Une fois la carte vérifiée, la plateforme affichera une page ou une section avec les détails :</p>
                <ul>
                    <li><strong>Statut de la carte/police</strong> : Active, Expirée, Suspendue, En attente.</li>
                    <li><strong>Identité du bénéficiaire</strong> : Nom, prénom.</li>
                    <li><strong>Identité de l'assuré principal</strong> (si différent).</li>
                    <li><strong>Entreprise/Groupe</strong>.</li>
                    <li><strong>Tableau des garanties</strong> : Détaillant les types de soins couverts (consultations,
                        hospitalisation, pharmacie, optique, dentaire, etc.) et les taux/plafonds de remboursement.</li>
                    <li><strong>Date de validité</strong> de la couverture.</li>
                </ul>
                <!-- <div class="image-placeholder">Placez ici une capture d'écran type d'une page de résultats de vérification, avec des zones mises en évidence pour chaque information clé.</div> -->
            </section>

            <section id="utilisation-sms">
                <h2 style="color: #3e1b0f">8. Utilisation du canal SMS</h2>
                <h3 style="color: #3e1b0f">Quand utiliser le canal SMS ?</h3>
                <p>Ce canal est une alternative précieuse en cas de :</p>
                <ul>
                    <li>Coupure d'Internet.</li>
                    <li>Absence d'ordinateur ou de smartphone connecté à proximité.</li>
                    <li>Accès réseau mobile plus fiable que l'accès Internet.</li>
                </ul>

                <h3 style="color: #3e1b0f">Format du SMS à envoyer</h3>
                <p>Le format exact vous sera communiqué par Ingenium Assurance. Un format type pourrait être :</p>
                <p><code class="code-block">COMMANDE [NuméroIdentificationUnique] [IdentifiantCentre]</code></p>
                <p><em>Exemple de commande de vérification :</em></p>
                <p><code class="code-block">VERIF GB-A1-A125-01-0001-QDW4-5 CENTRE123</code></p>
                <p>Envoyez ce SMS au numéro de service Ingenium Santé (ex: <code>+XXX XXXXXXXX</code>).</p>

                <h3 style="color: #3e1b0f">Interprétation de la réponse SMS</h3>
                <p>Vous recevrez un SMS en retour contenant les informations essentielles. Exemple de réponse :</p>
                <p><code class="code-block">INGENIUM SANTE: ELANIE NDONG S.R. - EGCC. Statut: ACTIF. Couv: 100% AMBU, 100%
                        HOSP. Zone: AFRIQUE UE. Valide jusqu'au JJ/MM/AAAA.</code></p>
                <p>Le message sera concis mais contiendra les informations clés pour la prise de décision.</p>
                <!-- <div class="image-placeholder">Placez ici une illustration simple de deux téléphones échangeant les SMS avec les exemples de messages.</div> -->
            </section>

            <section id="securite-bonnes-pratiques">
                <h2 style="color: #3e1b0f">9. Recommandations de sécurité et bonnes pratiques</h2>
                <ul>
                    <li><strong>Protection des identifiants</strong> :
                        <ul>
                            <li>Ne partagez jamais votre mot de passe.</li>
                            <li>Choisissez des mots de passe robustes.</li>
                            <li>Changez vos mots de passe régulièrement.</li>
                        </ul>
                    </li>
                    <li><strong>Gestion des sessions</strong> :
                        <ul>
                            <li>Déconnectez-vous toujours après utilisation.</li>
                            <li>Ne cochez pas "Se souvenir de moi" sur des ordinateurs partagés.</li>
                        </ul>
                    </li>
                    <li><strong>Confidentialité des données des patients</strong> :
                        <ul>
                            <li>Accédez aux informations uniquement dans le cadre de la prise en charge.</li>
                            <li>Respectez la réglementation sur la protection des données.</li>
                        </ul>
                    </li>
                    <li><strong>Mises à jour et maintenance</strong> :
                        <ul>
                            <li>Maintenez votre navigateur web à jour.</li>
                            <li>Signalez tout comportement suspect à Ingenium Assurance.</li>
                        </ul>
                    </li>
                    <li><strong>Vigilance</strong> : Méfiez-vous des tentatives de phishing. Ingenium Assurance ne vous
                        demandera jamais votre mot de passe par email ou téléphone.</li>
                </ul>
            </section>

            <section id="faq">
                <h2 style="color: #3e1b0f">10. Foire aux questions (FAQ)</h2>
                <article>
                    <h3 style="color: #3e1b0f">Q1 : Que faire si le numéro d'identification de la carte n'est pas reconnu
                        par la plateforme ?</h3>
                    <p>R : Vérifiez la saisie. Si le problème persiste, contactez le support Ingenium Assurance ou demandez
                        au patient de vérifier auprès de son employeur ou d'Ingenium.</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q2 : J'ai oublié mon mot de passe. Comment le réinitialiser ?</h3>
                    <p>R : Utilisez le lien "Mot de passe oublié ?" sur la page de connexion. Si vous êtes un utilisateur
                        standard, l'administrateur de votre centre peut vous aider. Si vous êtes administrateur, contactez
                        le support Ingenium Assurance.</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q3 : Les informations affichées sur la plateforme semblent incorrectes. Que
                        faire ?</h3>
                    <p>R : Contactez immédiatement le support Ingenium Assurance pour signaler l'anomalie avec le plus de
                        détails possible.</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q4 : Le service SMS ne répond pas. Que puis-je faire ?</h3>
                    <p>R : Vérifiez votre crédit et couverture réseau. Assurez-vous du bon numéro et format du SMS. Si le
                        problème persiste, réessayez ou contactez le support.</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q5 : Comment puis-je ajouter un nouvel utilisateur pour mon centre ?</h3>
                    <p>R : Si vous êtes administrateur, connectez-vous et cherchez la section "Gestion des utilisateurs"
                        (voir section 4).</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q6 : En tant que bénéficiaire, puis-je consulter mes propres informations via
                        la plateforme ?</h3>
                    <p>R : Ce guide s'adresse principalement aux prestataires. Si une interface dédiée aux bénéficiaires
                        existe, Ingenium Assurance vous en aura informé. Vos informations sont sur votre carte et documents
                        contractuels. Contactez votre RH ou Ingenium Assurance pour des détails.</p>
                </article>
                <article>
                    <h3 style="color: #3e1b0f">Q7 : Qui contacter en cas de problème technique ou pour une assistance ?</h3>
                    <p>R : Contactez le support Ingenium Assurance. Les coordonnées vous ont été communiquées. Consultez
                        également <a href="http://www.ingenium-assurance.com"
                            target="_blank">www.ingenium-assurance.com</a>.</p>
                </article>
            </section>
        </main>
    </div>
@endsection
