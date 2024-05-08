@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all posts on the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "All Posts • Dashboard | zakialawi.my.id")
@section("og_description", "List of all posts on the zakialawi.my.id website")

@push("css")
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

    <div class="p-2 card">
        <div class="d-flex">
            <h3>{{ __("Title: " . $article->title) }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="p-2 card">
                <table class="table table-hover table-striped">
                    <tr>
                        <td>{{ __("Title") }}</td>
                        <td width:3px>:</td>
                        <td>{{ $article->title }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Url") }}</td>
                        <td width:3px>:</td>
                        <td><a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}" target="_blank">{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}</a></td>
                    </tr>
                    <tr>
                        <td>{{ __("Author") }}</td>
                        <td width:3px>:</td>
                        <td>{{ $article->user->username }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Status") }}</td>
                        <td width:3px>:</td>
                        <td><span class="badge badge-{{ $article->status === "published" ? "info" : "secondary" }}">{{ $article->status }}</span></td>
                    </tr>
                    <tr>
                        <td>{{ __("Published at") }}</td>
                        <td width:3px>:</td>
                        <td>{{ $article?->published_at->diffForHumans() ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Created at") }}</td>
                        <td width:3px>:</td>
                        <td>{{ $article?->created_at->diffForHumans() ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Visitors") }}</td>
                        <td width:3px>:</td>
                        <td>{{ $article->total_views }}</td>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-2 card">
                        <div id="stats-map"></div>
                        <pre id="csv"></pre>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="p-2 card">
                        <h4>{{ __("Visitors") }}</h4>
                        <table id="myTable" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Country Code</th>
                                    <th>Visitors</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($views as $view)
                                    <tr>
                                        <td>{{ $view->location }}</td>
                                        <td>{{ $view->code }}</td>
                                        <td>{{ $view->views }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    @endsection

    @push("javascript")
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/maps/modules/data.js"></script>
        <script src="https://code.highcharts.com/maps/modules/accessibility.js"></script>

        <script>
            const viewsData = @json($views);

            (async () => {

                const topology = await fetch(
                    'https://code.highcharts.com/mapdata/custom/world.topo.json'
                ).then(response => response.json());

                const mapData = viewsData.map(item => ({
                    "hc-key": item.code.toLowerCase(),
                    "value": item.views
                }));

                Highcharts.mapChart('stats-map', {
                    chart: {
                        map: topology
                    },

                    title: {
                        text: 'Visitors by Country',
                        align: 'left'
                    },

                    mapNavigation: {
                        enabled: true,
                        buttonOptions: {
                            verticalAlign: 'bottom'
                        }
                    },

                    colorAxis: {
                        min: 0,
                        type: 'linear',
                    },

                    tooltip: {
                        valueDecimals: 0,

                        valueSuffix: ' visitors'
                    },

                    series: [{
                        data: mapData,
                        name: 'Visitors',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        states: {
                            select: {
                                color: '#a4edba',
                                borderColor: 'gray',
                            },
                            hover: {
                                color: '#BADA55',
                                enabled: true,
                                borderColor: 'gray',
                            },
                        },
                    }]
                });

            })();

            let table = new DataTable('#myTable', {
                order: [
                    [2, 'desc']
                ],
            })
        </script>
    @endpush
