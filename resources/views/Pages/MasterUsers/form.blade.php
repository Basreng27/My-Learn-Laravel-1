<div class="modal-header">
    <h4 class="modal-title">Form Add/Edit {{ $pageTitle }}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="{{ route(!empty($data->id) ? 'update-user' : 'save-user') }}" method="POST">
    <div class="modal-body">
        @csrf

        <input type="hidden" name="id" value="{{ $data->id ?? null }}">

        <div class="form-group">
            <label>Name <span class="required-field">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $data->name ?? null }}"
                placeholder="name" required>
        </div>

        <div class="form-group">
            <label>Email <span class="required-field">*</span></label>
            <input type="email" class="form-control" name="email" value="{{ $data->email ?? null }}"
                placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Password <span class="required-field">*</span></label>
            <input type="passsword" class="form-control" name="password" placeholder="Password" required>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
