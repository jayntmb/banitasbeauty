<div class="block-logo-agency">
    <div class="container">
        <h2 class="text-center fadeUp wow animate__animated animate__fadeIn">Ils nous ont fait confiance</h2>
        <div class="row justify-content-center align-items-center g-lg-5 g-3">
            @foreach ($partenaires as $partenaire)
                <div class="col-lg-2 d-flex justify-content-center col-6">
                    <img src="{{ asset('assets/images/'.$partenaire->image) }}" alt="mokole-logo" class="w-50">
                </div>
            @endforeach
        </div>
    </div>
</div>
