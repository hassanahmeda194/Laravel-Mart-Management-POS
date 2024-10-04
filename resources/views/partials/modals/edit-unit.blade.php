   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel">Edit Unit</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <hr>
           <div class="modal-body">
               <form action="{{ route('unit.update', ['id' => $Unit->id]) }}" method="post">
                   @csrf
                   <div class="row">
                       <div class="col-md-4 mb-3">
                           <label for="unit_name" class="form-label">Unit Name</label>
                           <input type="text" class="form-control" id="unit_name" name="name"
                               value="{{ $Unit->name }}" required>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="short_code" class="form-label">Short Code</label>
                           <input type="text" class="form-control" id="short_code" name="short_code"
                               value="{{ $Unit->short_code }}" required>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="base_unit" class="form-label">Base Unit</label>
                           <input type="text" class="form-control" id="base_unit" name="base_unit"
                               value="{{ $Unit->base_unit }}">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="operator" class="form-label">Operator</label>
                           <select id="operator" name="operator" class="form-select">
                               <option value="*" @selected($Unit->operator == '*')>*</option>
                               <option value="/" @selected($Unit->operator == '/')>/</option>
                           </select>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="operator_value" class="form-label">Operator Value</label>
                           <input type="text" class="form-control" id="operator_value" name="operator_value"
                               value="{{ $Unit->operator_value }}" required>
                       </div>
                       <div class="col-md-12 mb-3">
                           <button class="btn btn-dark" type="submit">Update Unit</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
