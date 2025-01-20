<div class="block-search-lg d-flex d-sm-none">
    <form method="get" action="{{ route('produits.recherche') }}">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="nom" placeholder="Recherche" required>
        <button class="btn">
            <i class="bi bi-search"></i>
        </button>
        </div>
    </form>
</div>
