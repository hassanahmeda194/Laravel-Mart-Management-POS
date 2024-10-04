@extends('layout.pos-master')
@section('main_section')
    <div class="min-vh-100">
        <div class="row align-items-center">
            <div class="col-12 py-3 px-4">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>
            <div class="col-6 min-vh-100 bg-body-secondary">
                <div class="row">
                    <div class="col-12 pt-3">
                        <input type="text" class="form-control py-3" placeholder="Search Product.."
                            id="search-product-input">
                    </div>
                    <div class="col-12 pt-4" id="search-product">

                    </div>
                </div>
            </div>
            <div class="col-6 min-vh-100 bg-body-tertiary">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="row g-0 product-list">
                                <div class="col-xxl-12">
                                    <div class="card-header d-flex align-items-center gap-2">
                                        <h5 class="card-title flex-grow-1 mb-0">Shopping Cart</h5>
                                        <div class="flex-shrink-0">
                                            <span class="badge bg-danger-subtle text-danger">5 Items</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-borderless mb-0">
                                                <thead class="table-active">
                                                    <tr>
                                                        <th>Product Items</th>
                                                        <th>Item Price</th>
                                                        <th>Quantity</th>
                                                        <th class="text-end">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="product">
                                                        <td>
                                                            <div class="product-item d-flex align-items-center gap-3">
                                                                <div class="avatar-md flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="assets/images/products/48/img-1.png"
                                                                            alt="" class="avatar-sm">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">Branded T-Shirts</a></h6>
                                                                    <p class="text-muted mb-2"><a href="#!"
                                                                            class="text-reset">Fashion</a></p>
                                                                    <p class="mb-0"><span class="text-muted">Size:</span>
                                                                        XL <span class="text-muted">Color:</span> Blue</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$<span class="product-price">161.25</span></td>
                                                        <td>
                                                            <div class="input-step">
                                                                <button type="button" class="minus">–</button>
                                                                <input type="number" class="product-quantity"
                                                                    value="3" min="0" max="100"
                                                                    readonly="">
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="fw-medium text-end">$<span
                                                                class="product-line-price">483.75</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 align-items-end ">
                                    <div class="border-start-xxl border-top-xxl-0 border-top h-100">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Order Summary</h5>
                                        </div>
                                        <div class="card-body mt-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-semibold" colspan="2">Sub Total :</td>
                                                            <td class="fw-semibold text-end cart-subtotal">$2272.95</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Discount <span
                                                                    class="text-muted">(STEEX30)</span> : </td>
                                                            <td class="text-end cart-discount">-$340.94</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">Estimated Tax (18%): </td>
                                                            <td class="text-end cart-tax">$284.12</td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2">Total (USD) :</th>
                                                            <td class="text-end">
                                                                <span class="fw-semibold cart-total">$2281.13</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-end mt-4 d-flex flex-wrap gap-1 justify-content-end">
                                                <a href="apps-ecommerce-products-grid.html"
                                                    class="btn btn-secondary">Continue Shopping</a>
                                                <a href="apps-ecommerce-checkout.html" class="btn btn-primary">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#search-product-input').keyup(function(e) {
    var val = $(this).val(); 
    $.ajax({
        type: "GET",
        url: "{{ route('search.product') }}",
        data: {
            data: val
        },
        success: function(response) {
            $('#search-product').html(response); 
        }
    });
});

    </script>
@endsection
