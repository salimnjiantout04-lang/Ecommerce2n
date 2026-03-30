<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('header')

<div class="container mt-5">
    <h2 class="mb-4">Mon compte</h2>
    <div class="row">
        <!-- Sidebar filtres -->
        <aside class="col-lg-3 mb-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        @php
                            $parts = preg_split('/\s+/', trim(Auth::user()->name ?? ''));
                            $initials = '';
                            if (!empty($parts) && isset($parts[0])) { $initials .= mb_substr($parts[0], 0, 1); }
                            if (!empty($parts) && isset($parts[1])) { $initials .= mb_substr($parts[1], 0, 1); }
                            if ($initials === '' && isset($parts[0])) { $initials = mb_substr($parts[0], 0, 1); }
                        @endphp
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center border" style="width:64px;height:64px;background:#f1f3f5;color:#2b2d42;font-weight:600;">
                            {{ strtoupper($initials) }}
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <div class="text-muted small">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted small mb-3">Filtrer par période</h6>
                    <div class="d-grid gap-2">
                        <a href="?periode=30" class="btn btn-sm {{ (request('periode') == 30) ? 'btn-primary' : 'btn-outline-secondary' }}">30 derniers jours</a>
                        <a href="?periode=90" class="btn btn-sm {{ (request('periode') == 90) ? 'btn-primary' : 'btn-outline-secondary' }}">3 derniers mois</a>
                        <a href="?periode=365" class="btn btn-sm {{ (request('periode') == 365) ? 'btn-primary' : 'btn-outline-secondary' }}">12 derniers mois</a>
                        @if(request()->has('periode'))
                            <a href="{{ url()->current() }}" class="btn btn-light btn-sm">Réinitialiser</a>
                          

                        @endif
                    </div>
                </div>
            </div>

            {{--
            <div class="card">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted small mb-3">Filtrer par état</h6>
                    <div class="d-grid gap-2">
                        <a href="?etat=En cours" class="btn btn-outline-secondary btn-sm">En cours</a>
                        <a href="?etat=Livré" class="btn btn-outline-secondary btn-sm">Livré</a>
                        <a href="?etat=Annulé" class="btn btn-outline-secondary btn-sm">Annulé</a>
                    </div>
                </div>
            </div>
            --}}
        </aside>

        <!-- Liste des commandes -->
        <section class="col-lg-9">
            <h4 class="mb-3">Historique de mes transactions</h4>

            @forelse($auteurs as $auteur)
                @php
                    $total = 0;
                    $etatGlobal = null;
                @endphp
                @foreach($auteur->commandenvs as $com)
                    @php
                        $total += ($com->prix * $com->qtte);
                        // on prend le premier état comme indicatif
                        $etatGlobal = $etatGlobal ?? $com->etat;
                    @endphp
                @endforeach

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start mb-2">
                            <div>
                                <div class="fw-semibold">Commande T00{{ $auteur->id }}</div>
                                <div class="text-muted small">Passée le {{ $auteur->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge {{ $etatGlobal === 'Livré' ? 'bg-success' : ($etatGlobal === 'Annulé' ? 'bg-danger' : 'bg-warning text-dark') }}">{{ $etatGlobal ?? '—' }}</span>
                                <div class="fw-bold mt-1">{{ number_format($total, 0, ',', ' ') }} FCFA</div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-2">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produit</th>
                                        <th class="text-end">Prix</th>
                                        <th class="text-center">Qté</th>
                                        <th class="text-center">État</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $val = 0; @endphp
                                    @foreach($auteur->commandenvs as $com)
                                        @php $ligne = $com->prix * $com->qtte; $val += $ligne; @endphp
                                        <tr>
                                            <td>{{ $com->produit->libelle }}</td>
                                            <td class="text-end">{{ number_format($com->prix, 0, ',', ' ') }} FCFA</td>
                                            <td class="text-center">{{ $com->qtte }}</td>
                                            <td class="text-center">
                                                <span class="badge {{ $com->etat === 'Livré' ? 'bg-success' : ($com->etat === 'Annulé' ? 'bg-danger' : 'bg-secondary') }}">{{ $com->etat }}</span>
                                            </td>
                                            <td class="text-end">{{ number_format($ligne, 0, ',', ' ') }} FCFA</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end fw-semibold">Total</td>
                                        <td class="text-end fw-bold">{{ number_format($val, 0, ',', ' ') }} FCFA</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $auteur->id }}">Voir le détail</button>
                            <a href="{{ route('facture.download', ['id' => $auteur->id]) }}" class="btn btn-outline-secondary btn-sm">Télécharger la facture</a>
                        </div>
                    </div>
                </div>

                <!-- Modal détail transaction -->
                <div class="modal fade" id="detailModal{{ $auteur->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $auteur->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $auteur->id }}">Détail de la commande T00{{ $auteur->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                              <thead>
                                <tr>
                                  <th>Produit</th>
                                  <th>Prix</th>
                                  <th>Quantité</th>
                                  <th>État</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $val = 0; @endphp
                                @foreach($auteur->commandenvs as $com)
                                  @php $ligne = $com->prix * $com->qtte; $val += $ligne; @endphp
                                  <tr>
                                    <td>{{ $com->produit->libelle }}</td>
                                    <td>{{ number_format($com->prix, 0, ',', ' ') }} FCFA</td>
                                    <td>{{ $com->qtte }}</td>
                                    <td>{{ $com->etat }}</td>
                                    <td>{{ number_format($ligne, 0, ',', ' ') }} FCFA</td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td colspan="4" class="text-end"><strong>Total</strong></td>
                                  <td><strong>{{ number_format($val, 0, ',', ' ') }} FCFA</strong></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @empty
                <div class="alert alert-info">Aucune transaction trouvée.</div>
            @endforelse

        </section>
    </div>
</div>

<BR></BR><BR>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@include('footer1')

</body>
</html>
