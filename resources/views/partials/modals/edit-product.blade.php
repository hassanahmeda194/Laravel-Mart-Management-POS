  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-4 mb-3">
                          <label for="name" class="form-label">Product Name</label>
                          <input type="text" class="form-control" id="name" name="name"
                              placeholder="Enter product name" required value="{{ $product->name }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="product_code" class="form-label">Product Code</label>
                          <input type="text" class="form-control" id="product_code" name="product_code"
                              placeholder="Enter product code" required value="{{ $product->product_code }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="quantity" class="form-label">Quantity</label>
                          <input type="number" class="form-control" id="quantity" name="quantity"
                              placeholder="Enter quantity" required value="{{ $product->quantity }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="price" class="form-label">Sales Price</label>
                          <input type="number" class="form-control" id="price" name="sales_price"
                              placeholder="Enter Sales Price" required value="{{ $product->sales_price }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="cost" class="form-label">Purchase Price</label>
                          <input type="number" class="form-control" id="cost" name="purchase_price"
                              placeholder="Enter Purchase Price" required value="{{ $product->purchase_price }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="tax_per_unit" class="form-label">Tax per Unit</label>
                          <input type="text" class="form-control" id="tax_per_unit" name="tax_per_unit"
                              placeholder="Enter tax per unit" required value="{{ $product->tax_per_unit }}">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="brand_id" class="form-label">Brand</label>
                          <select class="form-select" id="brand_id" name="brand_id">
                              <option value="">Select brand</option>
                              @foreach ($brand as $b)
                                  <option value="{{ $b->id }}" @selected($b->id == $product->brand_id)>{{ $b->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="category_id" class="form-label">Category</label>
                          <select class="form-select" id="category_id" name="category_id">
                              <option value="">Select category</option>
                              @foreach ($category as $c)
                                  <option value="{{ $c->id }}" @selected($b->id == $product->category_id)>{{ $c->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="unit_id" class="form-label">Unit</label>
                          <select class="form-select" id="unit_id" name="unit_id">
                              <option value="">Select unit</option>
                              @foreach ($unit as $u)
                                  <option value="{{ $u->id }}" @selected($u->id == $product->unit_id)>{{ $u->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="branch_id" class="form-label">Branch</label>
                          <select class="form-select" id="branch_id" name="branch_id">
                              <option value="">Select branch</option>
                              @foreach ($branch as $b)
                                  <option value="{{ $b->id }}" @selected($b->id == $product->branch_id)>{{ $b->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="branch_id" class="form-label">Product Image</label>
                          <input class="form-control" name="product_image" type="file">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="stock_alert" class="form-label">Stock alert</label>
                          <input class="form-control" name="stock_alert" type="number" placeholder="0"
                              value="{{ $product->stock_alert }}">
                      </div>
                      <div class="col-md-12 my-3">
                          <button class="btn btn-dark" type="submit">Update Product</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
