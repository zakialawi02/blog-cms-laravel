@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all posts on the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "All Posts • Dashboard | zakialawi.my.id")
@section("og_description", "List of all posts on the zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __($data["title"] ?? "") }}</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="p-3 card">

        <div class="px-2 mb-3 d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <h3>{{ __("Post Statistics") }}</h3>
            </div>
            <div class="">

            </div>
        </div>


        @if (session("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session("error"))
            <div class="alert alert-error alert-dismissible fade show" role="alert">
                {{ session("error") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="">
            <div id="coloum-chart" class="mb-3 text-center"><i class="spinner-border text-primary"></i></div>
            <hr class="mb-3">
        </div>

        <div class="">
            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Status</th>
                        <th scope="col">Published</th>
                        <th scope="col">View</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- server side --}}
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>

    </div>



@endsection

@push("javascript")
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>

    <script>
        (async () => {

            const data = await fetch(
                '{{ route("admin.posts.statslast6months") }}'
            ).then(response => response.json());
            const mapData = data.map(item => [item.timestamp * 1000, item.view_count]);

            // create the chart
            Highcharts.stockChart('coloum-chart', {
                chart: {
                    alignTicks: false
                },

                rangeSelector: {
                    selected: 0
                },

                title: {
                    text: 'Visitor Statistics'
                },

                series: [{
                    type: 'column',
                    name: 'Visitor Statistics',
                    data: mapData,
                    dataGrouping: {
                        units: [
                            [
                                'day',
                                [1]
                            ],
                            [
                                'month',
                                [1, 2, 3]
                            ],
                        ]
                    }
                }]
            });
        })();

        let table = new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ url()->current() }}",
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [10, 15, 25, 50, "All"]
            ],
            language: {
                paginate: {
                    previous: '<i class="mdi mdi-chevron-left">',
                    next: '<i class="mdi mdi-chevron-right">'
                }
            },
            order: [
                [3, 'desc']
            ],
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'published_at',
                    name: 'published_at'
                },
                {
                    data: 'total_views',
                    name: 'total_views'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        })
    </script>
@endpush
