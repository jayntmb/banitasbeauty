<div class="banner">
    <div class="content-banner flex-column">
        <div class="img-banner">
            <img src="{{ asset('storage/' . $banner->image) }}" alt="Bannière" class="w-100 h-100 object-fit-cover" />
        </div>
        <div class="content-text w-100 my-auto">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-xxl-4">
                        <div class="text-start">
                            <h2 class="mb-lg-3 d-flex flex-column mt-lg-5 mt-4">
                                <span>{{ $banner->title_line1 }}</span>
                                <span>{{ $banner->title_line2 }}</span>
                            </h2>
                            <p class="mb-lg-5">
                                {{ $banner->description }}
                            </p>
                            <a href="{{ $banner->button_link }}" class="btn btn-lg btn-white">
                                {{ $banner->button_text }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
