<div class="tabBar d-block d-lg-none fixed-bottom">
    <div class="content-tab d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="link-tab d-flex align-items-center {{ request()->is('administratiton/tableau-de-bord') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Accueil</span>
        </a>
        <a href="{{ route('admin.produits') }}" class="link-tab d-flex align-items-center {{ request()->is('administratiton/tableau-de-bord/produits') ? 'active' : '' }}">
            <i class="fas fa-tags"></i>
            <span>Produits</span>
        </a>
        <a href="{{ route('admin.devis') }}" class="link-tab d-flex align-items-center {{ request()->is('administratiton/tableau-de-bord/devis') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Devis</span>
        </a>
        <a href="{{ route('admin.commande.client')}}" class="link-tab d-flex align-items-center {{ request()->is('administratiton/tableau-de-bord/client/commandes') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart"></i>
            <span>Commandes</span>
        </a>
    </div>
</div>
