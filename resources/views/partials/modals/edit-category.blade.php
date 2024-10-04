   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
                   @csrf
                   <div class="row">
                       <div class="col-md-6 mb-3">
                           <label for="branch_name" class="form-label">Category Code</label>
                           <input type="text" class="form-control bg-light " id="name" name="name"
                               value="{{ $category->category_code }}" required readonly>
                       </div>
                       <div class="col-md-6 mb-3">
                           <label for="branch_name" class="form-label">Category Name</label>
                           <input type="text" class="form-control" id="name" name="name"
                               value="{{ $category->name }}" required>
                       </div>
                       <div class="col-md-12 mb-3">
                           <button class="btn btn-dark" type="submit">Update Category</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
