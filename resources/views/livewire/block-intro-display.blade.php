<div class="block-intro">
    <div class="container-fluid px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xxl-8">
                <h3 class="text-center">
                    {{ $phrase1 }}
                    <div class="avatar">
                        <img src="{{ asset('storage/' . $image1) }}" alt="Produits de maquillage premium Banitas">
                        <div class="video">
                            <video src="{{ asset('storage/' . $video1) }}" autoplay muted playisline loop></video>
                        </div>
                    </div>
                    {{ $phrase2 }}
                    <div class="avatar">
                        <img src="{{ asset('storage/' . $image2) }}" alt="Soins visage naturels et efficaces">
                        <div class="video">
                            <video src="{{ asset('storage/' . $video2) }}" autoplay muted playisline loop></video>
                        </div>
                    </div>
                    {{ $phrase3 }}
                    <div class="avatar">
                        <img src="{{ asset('storage/' . $image3) }}" alt="Résultats beauté prouvés">
                        <div class="video">
                            <video src="{{ asset('storage/' . $video3) }}" autoplay muted playisline loop></video>
                        </div>
                    </div>
                    {{ $phrase4 }}
                </h3>
            </div>
        </div>
    </div>
</div>
