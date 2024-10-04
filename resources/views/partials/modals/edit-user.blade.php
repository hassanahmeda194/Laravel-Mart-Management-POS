   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel">Edit User</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <hr>
           <div class="modal-body">
               <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post"
                   enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                       <div class="col-md-4 mb-3">
                           <label for="user_id" class="form-label">User ID</label>
                           <input type="text" class="form-control bg-light" id="user_id" name="user_id"
                               value="{{ $user->User_Id }}" required readonly>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Username" required value="{{ $user->username }}">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="phone_number" class="form-label">Phone Number</label>
                           <input type="tel" class="form-control" id="phone_number" name="phone_number"
                               placeholder="Enter phone number" required value="{{ $user->phone_number }}">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter email address" required value="{{ $user->email }}">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter password">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="password_confirmation" class="form-label">Confirm Password</label>
                           <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" placeholder="Confirm password">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="country" class="form-label">Country</label>
                           <select id="country" name="country" class="form-select">
                               <option value="Pakistan" @selected($user->country == 'Pakistan')>Pakistan</option>
                           </select>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="city" class="form-label">City</label>
                           <select id="city" name="city" class="form-select" required>
                               <option value="" disabled selected>Select city</option>
                               <option value="Karachi" @selected($user->city == 'Karachi')>Karachi</option>
                               <option value="Lahore" @selected($user->city == 'Lahore')>Lahore</option>
                               <option value="Islamabad" @selected($user->city == 'Islamabad')>Islamabad</option>
                               <option value="Peshawar" @selected($user->city == 'Peshawar')>Peshawar</option>
                               <option value="Quetta" @selected($user->city == 'Quetta')>Quetta</option>
                           </select>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="profile_image" class="form-label">Profile Image</label>
                           <input type="file" class="form-control" id="profile_image" name="profile_image"
                               placeholder="Upload profile image">
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="branch_id" class="form-label">Branch</label>
                           <select id="branch_id" name="branch_id" class="form-select">
                               @foreach ($branches as $branch)
                                   <option value="{{ $branch->id }}" @selected($user->branch_id == $branch->id)>{{ $branch->name }}
                                       ({{ $branch->address }})
                                   </option>
                               @endforeach
                           </select>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="role_id" class="form-label">Role</label>
                           <select id="role_id" name="role_id" class="form-select">
                               @foreach ($roles as $role)
                                   <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>{{ $role->name }}
                                   </option>
                               @endforeach
                           </select>
                       </div>
                       <div class="col-md-4 my-3 pt-3">
                           <div class="form-check form-switch form-switch-md">
                               <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                   id="is_active" @checked($user->is_active == true)>
                               <label class="form-check-label" for="is_active">Is Active</label>
                           </div>
                           <br>
                       </div>
                       <div class="col-md-12 mb-3">
                           <label for="address" class="form-label">Address</label>
                           <textarea id="address" name="address" rows="3" class="form-control" placeholder="Enter address">{{ $user->address ?? '' }}</textarea>
                       </div>
                       <div class="col-md-12 mb-3">
                           <button class="btn btn-dark" type="submit">Update User</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
