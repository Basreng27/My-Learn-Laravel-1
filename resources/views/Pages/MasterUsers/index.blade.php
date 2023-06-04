@extends('Layouts.layout')

@section('content')
    <div class="content-wrapper">
        @include('Layouts.Partials.breadCumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                    <i class="fa-solid fa-plus"></i> Add
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('Layouts.Components.datatables', [
                                            'id' => 'data-tabless',
                                            'form_filter' => '#form-filter',
                                            'header' => ['', 'No', 'Name', 'Email', 'Action'],
                                            'data_source' => route('data-user'),
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom-scripts')
    <script>
        var oTable = $('#data-tabless').myDataTable({
            // buttons: [{
            //     id: 'add',
            //     className: 'btn btn primary',
            //     url: '{{ route('data-user') }}'
            // }],
            actions: [{
                    id: 'edit',
                    className: 'btn btn-light btn-sm',
                    url: '{{ route('edit-user', ['__grid_doc__']) }}'
                },
                {
                    id: 'delete',
                    className: 'btn btn-danger btn-sm btn-delete',
                    url: '{{ route('data-user') }}'
                }
            ],
            columns: [{
                    data: 'checkbox',
                    className: 'text-center',
                    width: '30px',
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    width: '30px',
                    className: 'text-center',
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    className: 'text-center',
                    width: '120px',
                }
            ],
            onDraw: function() {
                initModalAjax('[data-toggle="modal-edit"]');
                initDatatableAction($(this), function() {
                    oTable.reload();
                });
            },
            onComplete: function() {
                initModalAjax();
            },
        })

        $(function() {
            // initPage();
            initDatatableTools($('#example2'), oTable);
        });
    </script>
@endpush
