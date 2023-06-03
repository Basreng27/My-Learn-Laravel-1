<div class="modal-header">
    <h4 class="modal-title">Form Add/Edit Menu</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="{{ route('save-menu') }}" method="POST">
    <div class="modal-body">
        @csrf

        <div class="form-group">
            <label>Label <span class="required-field">*</span></label>
            <input type="text" class="form-control" name="label" placeholder="Label" required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" name="code" placeholder="Code" required>
        </div>

        <div class="form-group">
            <label>Url <span class="required-field">*</span></label>
            <select class="form-control select2" name="url" style="width: 100%;">
                {{-- <option value="" selected="selected">--- Select ---</option> --}}
                @foreach ($routes as $route)
                    <option value="{{ $route }}" selected="selected">{{ $route }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Icon <span class="required-field">*</span></label>
            <input type="text" class="form-control" name="icon" placeholder="Icon" required>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
