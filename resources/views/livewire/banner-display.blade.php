<div class="banner">
    <div class="content-banner flex-column">
        <div class="img-banner">
            <img src="{{ asset('storage/images/banners/' . $banner->image) }}" alt="Bannière" class="w-100 h-100 object-fit-cover" />
        </div>
        <div class="content-text w-100 my-auto">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-xxl-4">
                        <div class="text-start">
                            <h2 class="mb-lg-3 d-flex flex-column mt-lg-5 mt-4">
                                <span>{{ $banner->title }}</span>
                            </h2>
                            <p class="mb-lg-5">
                                {{ $banner->description }}
                            </p>
                            <a href="/boutique" class="btn btn-lg btn-white">
                                Explorer nos produits
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
