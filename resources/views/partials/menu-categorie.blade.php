@php
    $produits = \App\Models\Produit::whereHas('categorie', function($q) use ($categorieId) {
            $q->where('id', $categorieId);
        })
        ->orWhereHas('souscategorie.categorie', function($q) use ($categorieId) {
            $q->where('id', $categorieId);
        })
        ->where('qttestock', '>', 0)
        ->limit(12)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp

<ul class="dropdown-menu">
    <li><h6 class="dropdown-header">{{ $categorieName }}</h6></li>
    
    @forelse($produits as $produit)
        <li>
            <a class="dropdown-item" href="{{ route('detailprod', ['id' => $produit->id]) }}">
                {{ Str::limit($produit->libelle, 45) }}
            </a>
        </li>
    @empty
        <li><span class="dropdown-item text-muted">Aucun produit disponible</span></li>
    @endforelse
    
    <li><hr class="dropdown-divider"></li>
    <li>
        <a class="dropdown-item text-primary fw-bold" href="{{ route('produitcate', [$categorieId, Str::slug($categorieName)]) }}">
            → Voir tous {{ $categorieName }} ({{ $produits->count() }}+)
        </a>
    </li>
</ul>
