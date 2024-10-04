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
                    <h4 class="mb-3">Units</h4>
                    <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fa fa-plus-circle me-2"></i>
                        Add Unit</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Datatable">
                        <thead>
                            <tr class="bg-light">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Short Code</th>
                                <th>Base Unit</th>
                                <th>Operator</th>
                                <th>Operator Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->short_code }}</td>
                                    <td>{{ $unit->base_unit ?? '-' }}</td>
                                    <td>{{ $unit->operator }}</td>
                                    <td>{{ $unit->operator_value }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm edit-btn"
                                            data-id="{{ $unit->id }}">
                                            <i class="fa fa-edit m-0"></i>
                                        </button>
                                        <a href="{{ route('unit.delete', ['id' => $unit->id]) }}"
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
                    <h5 class="modal-title" id="myModalLabel">Add New Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <form action="{{ route('unit.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="unit_name" class="form-label">Unit Name</label>
                                <input type="text" class="form-control" id="unit_name" name="name"
                                    placeholder="Enter unit name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="short_code" class="form-label">Short Code</label>
                                <input type="text" class="form-control" id="short_code" name="short_code"
                                    placeholder="Enter short code" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="base_unit" class="form-label">Base Unit</label>
                                <input type="text" class="form-control" id="base_unit" name="base_unit"
                                    placeholder="Enter base unit">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="operator" class="form-label">Operator</label>
                                <select id="operator" name="operator" class="form-select">
                                    <option value="*">*</option>
                                    <option value="/">/</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="operator_value" class="form-label">Operator Value</label>
                                <input type="text" class="form-control" id="operator_value" name="operator_value"
                                    placeholder="Enter operator value" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-dark" type="submit">Add Unit</button>
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
                    url: "{{ route('unit.edit') }}",
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
