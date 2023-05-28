<form action="#">
    <div class="modal-header">
        <h4 class="modal-title">Form Add/Edit Menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
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
            <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
            </select>
        </div>

        <div class="form-group">
            <label>Icon <span class="required-field">*</span></label>
            <input type="text" class="form-control" name="icon" placeholder="Icon" required>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
</form>
