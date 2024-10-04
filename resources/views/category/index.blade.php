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
                    <h4 class="mb-3">Category</h4>
                    <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fa fa-plus-circle me-2"></i>
                        Add Category</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Datatable">
                        <thead>
                            <tr class="bg-light">
                                <th>Sno</th>
                                <th>Category Code</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_code }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm edit-btn"
                                            data-id="{{ $category->id }}"><i class="fa fa-edit m-0"></i></button>
                                        <a href="{{ route('category.delete', ['id' => $category->id]) }}"
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="branch_name" class="form-label">Category Code</label>
                                <input type="text" class="form-control bg-light " id="name" name="name"
                                    value="{{ $category_code }}" required readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="branch_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Category name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-dark" type="submit">Add Category</button>
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
                let Role_ID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.edit') }}",
                    data: {
                        id: Role_ID
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
