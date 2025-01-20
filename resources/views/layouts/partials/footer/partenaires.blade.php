@php
    use App\Models\PartenaireLogo;
    $partLogos = PartenaireLogo::where('statut_id','1')->get();
@endphp
<div class="block-logo-agency">
    <div class="container">
        <h2 class="text-center fadeUp wow animate__animated animate__fadeIn">Ils nous ont fait confiance</h2>
        <div class="row justify-content-center align-items-center g-lg-5 g-3">
            @foreach ($partLogos as $key=>$partenaire)
                <div class="col-lg-2 d-flex justify-content-center col-6 col-md-4">
                    <img src="{{ asset('assets/images/partenaires/logos/'.$partenaire->logo) }}" alt="mokole-logo" class="w-50">
                </div>
            @endforeach
        </div>
    </div>
</div>
