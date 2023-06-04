<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="{{ isset($id) ? $id : 'example1' }}" class="table table-bordered table-hover"
                    data-table-source="{{ isset($data_source) ? $data_source : '' }}"
                    data-table-filter="{{ isset($form_filter) ? $form_filter : '#form-filter' }}" data-auto-filter="true">
                    <thead>
                        @if (isset($header) && count($header) > 0)
                            @foreach ($header as $key => $value)
                                <th>{{ __($value) }}</th>
                            @endforeach
                        @endif
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
