@extends('layout.master')
@section('main_section')
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-3">Branches</h4>
                    <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fa fa-plus-circle me-2"></i>
                        Add Branches</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Datatable">
                        <thead>
                            <tr class="bg-light">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>{{ $branch->country }}</td>
                                    <td>{{ $branch->city }}</td>
                                    @if ($branch->is_active == true)
                                        <td><span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge rounded-pill bg-danger-subtle text-danger">Deactivate</span>
                                        </td>
                                    @endif
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm edit-btn"
                                            data-id="{{ $branch->id }}"><i class="fa fa-edit m-0"></i></button>
                                        <a href="{{ route('branch.delete', ['id' => $branch->id]) }}"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash m-0"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add New Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <form action="{{ route('branch.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="branch_name" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="name"
                                    placeholder="Enter branch name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Enter phone number" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select id="country" name="country" class="form-select">
                                    <option value="Pakistan">Pakistan</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City</label>
                                <select id="city" name="city" class="form-select" required>
                                    <option value="" disabled selected>Select city</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Faisalabad">Faisalabad</option>
                                    <option value="Multan">Multan</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Quetta">Quetta</option>
                                    <option value="Sialkot">Sialkot</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="col-md-4 my-3 pt-3">
                                <div class="form-check form-switch form-switch-md">
                                    <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                        id="is_active" checked>
                                    <label class="form-check-label" for="is_active">Is Active</label>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" name="address" rows="5" class="form-control" placeholder="Enter address"></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button class="btn btn-dark" type="submit">Add Branch</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function(e) {
                e.preventDefault();
                let branch_ID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('branch.edit') }}",
                    data: {
                        id: branch_ID
                    },
                    success: function(response) {
                        $('#editModal').empty();
                        $('#editModal').html(response).modal('show');
                    }
                });
            });
        });
    </script>
@endsection
