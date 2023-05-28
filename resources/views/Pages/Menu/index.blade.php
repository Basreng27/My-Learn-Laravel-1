@extends('Layouts.layout')

@section('content')
    <div class="content-wrapper">
        @include('Layouts.Partials.breadCumb')

        <ul id="sortable-list">
            <li>Item 1
                <ul class="sortable-sub-list">
                    <li>Sub-item 1.1</li>
                    <li>Sub-item 1.2</li>
                </ul>
            </li>
            <li>
                <button type="button" class="btn btn-outline-white btn-block"><i class="fa fa-bell"></i> .btn-block</button>
            </li>
            <li>Item 3
                <ul class="sortable-sub-list">
                    <li>Sub-item 3.1</li>
                    <li>Sub-item 3.2</li>
                    <li>Sub-item 3.3</li>
                </ul>
            </li>
            <li>Item 4</li>
        </ul>


        @push('custom-scripts')
            <script>
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
            </script>
        @endpush


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>

                                    <div class="col-md-4">
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
