<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Branch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="branch_name" class="form-label">Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="name"
                            placeholder="Enter branch name" required value="{{ $branch->name }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Enter phone number" required value="{{ $branch->phone_number }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select id="country" name="country" class="form-select">
                            <option value="Pakistan" @selected($branch->country == 'Pakistan')>Pakistan</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="city" class="form-label">City</label>
                        <select id="city" name="city" class="form-select" required>
                            <option value="" disabled selected>Select city</option>
                            <option value="Karachi" @selected($branch->city == 'Karachi')>Karachi</option>
                            <option value="Lahore" @selected($branch->city == 'Lahore')>Lahore</option>
                            <option value="Islamabad" @selected($branch->city == 'Islamabad')>Islamabad</option>
                            <option value="Peshawar" @selected($branch->city == 'Peshawar')>Peshawar</option>
                            <option value="Quetta" @selected($branch->city == 'Quetta')>Quetta</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter email" required value="{{ $branch->email }}">
                    </div>
                    <div class="col-md-4 my-3 pt-3">
                        <div class="form-check form-switch form-switch-md">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                id="is_active" @checked($branch->is_active)>
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-12 my-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" rows="5" class="form-control" placeholder="Enter address">{{ $branch->address ?? '' }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-dark" type="submit">Update Branch</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
