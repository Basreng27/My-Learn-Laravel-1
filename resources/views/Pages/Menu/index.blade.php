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
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                    <i class="fa-solid fa-plus"></i> Add
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="menu"></div>
                                        {{-- <ul id="sortable-list">
                                            <li>Item 1
                                                <ul class="sortable-sub-list">
                                                    <li>Sub-item 1.1</li>
                                                    <li>Sub-item 1.2</li>
                                                </ul>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-outline-white btn-block"><i
                                                        class="fa fa-bell"></i> .btn-block</button>
                                            </li>
                                            <li>Item 3
                                                <ul class="sortable-sub-list">
                                                    <li>Sub-item 3.1</li>
                                                    <li>Sub-item 3.2</li>
                                                    <li>Sub-item 3.3</li>
                                                </ul>
                                            </li>
                                            <li>Item 4</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                    </div>

                                    <div class="col-sm-3 col-6">
                                    </div>

                                    <div class="col-sm-3 col-6">
                                    </div>

                                    <div class="col-sm-3 col-6">
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

@push('plugin-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            $.get('{{ route('data-' . strtolower($module)) }}', function(out) {
                var data = out.data;
                var list = '<ul id="sortable-list">';
                var list_sub = '';

                // loop data
                data.forEach(function(item) {
                    var url = '{{ route('data-child-' . strtolower($module), ['id' => ':id']) }}'
                        .replace(':id', item.id);

                    list += '<li>' + item.label;

                    list += '<ul class="sortable-sub-list" id="sub-list">'

                    $.get(url, function(child) {
                        var data_child = child.data;
                        data_child.forEach(function(item_child) {
                            list_sub += '<li>' + item_child.label + '</li>'
                        });

                        $('#sub-list').html(list_sub)
                    });

                    list += '</li>';
                    list += '</li>';
                })

                list += '</ul>';

                $('#menu').html(list)

                const sortableList = document.getElementById('sortable-list');

                new Sortable(sortableList, {
                    animation: 150,
                    nested: true, // Aktifkan hierarki
                    group: {
                        name: 'sortable-group', // Ubah nama grup menjadi sortable-group
                        name: 'sortable-sub-group', // Ubah nama grup menjadi sortable-group
                    },
                });

                const sortableSubLists = document.getElementsByClassName('sortable-sub-list');

                Array.from(sortableSubLists).forEach((subList) => {
                    new Sortable(subList, {
                        animation: 150,
                        nested: true, // Aktifkan hierarki
                        group: {
                            name: 'sortable-group', // Gunakan nama grup yang sama
                            name: 'sortable-sub-group', // Gunakan nama grup yang sama
                        },
                    });
                });
            });
        });
    </script>
@endpush
