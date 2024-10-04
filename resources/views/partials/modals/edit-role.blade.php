<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="role" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="role" name="name"
                            placeholder="Enter branch name" required value="{{ $role->name }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button class="btn btn-dark" type="submit">Update Role</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
