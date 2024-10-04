<div id="products-container" class="row">
    @forelse ($products as $p)
        <div class="col-3">
            <div class="card card-body text-center border">
                <div class="d-flex mb-4 align-items-center justify-content-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset($p->product_image) }}" alt=""
                            class="avatar-sm rounded-circle text-center">
                    </div>
                </div>
                <p class="card-text text-bold">{{ $p->name }}</p>
                <h6 class="mb-1">{{ $p->sales_price }}</h6> <!-- corrected variable name -->
            </div>
        </div>
    @empty
        <p class="text-center fs-4">Product Not Found!</p>
    @endforelse
</div>
