@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
<link href="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.js"></script>

<div class="d-flex align-items-center justify-content-center min-vh-25 flex-column bg-white py-4">
    <div class="col-md-10 col-12 text-dark p-4 py-5 mt-2 h-100 rounded mx-auto">
        @if(isset($courier))
                <?php 
                                $loc = json_decode($courier->location);
            $statuses = \App\Models\Status::all();
                            ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
                <script>
                    function downloadPDF(tracking_id) {
                        const doc = document.getElementById('doc')
                        var opt = {
                            margin: [1, 0, 0, 0],
                            filename: 'myfile.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { dpi: 192, scale: 2, letterRendering: true },
                            jsPDF: { unit: 'mm', format: "a4", orientation: 'portrait' }
                        };
                        html2pdf()
                            .set(opt)
                            .from(doc)
                            .save(tracking_id + '.pdf');
                    }
                </script>

                <div class="w-100 mb-3">
                    <div id="map-container" style="width: 100%; height: 400px;"></div>
                    <select id="layer-select" class="form-select mt-3">
                        <option selected value="RoadOnDemand">Road</option>
                        <option value="Aerial">Aerial</option>
                        <option value="AerialWithLabelsOnDemand">Aerial with labels</option>
                        <option value="CanvasDark">Road dark</option>
                    </select>
                </div>


                <div class="mx-auto border font-monospace" id="doc">
                    <div class="bg-dark min-h-25 w-100 px-4 py-3 d-flex align-items-center justify-content-between">
                        <button class="btn btn-success  ">
                            STATUS: {{ $courier->status->name }}
                        </button>


                        <p class="text-white">
                            {{ $courier->created_at->format('d F Y') }}<br>
                            {{ $courier->tracking_id }}
                        </p>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12 col-md-6 text-dark border-light p-4 rounded">
                                <h3 class="h5 font-weight-medium mb-2">Tracking Information</h3>
                                <ul class="list-unstyled">
                                    <li>Tracking ID: <span class="font-weight-bold">{{ $courier->tracking_id }}</span></li>
                                    <li>Package Name: <span class="font-weight-bold">{{ $courier->package_name }}</span></li>
                                    <li>Quantity: <span class="font-weight-bold">{{ $courier->quantity }}</span></li>
                                    <li>Parcel Weight: <span class="font-weight-bold">{{ $courier->parcel_weight }}</span></li>
                                    <li>Parcel Color: <span class="font-weight-bold">{{ $courier->parcel_color }}</span></li>
                                    <li>Parcel Status: <span class="font-weight-bold">{{ $courier->status->name }}</span></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 text-dark border-light p-4 rounded">
                                <h3 class="h5 font-weight-medium mb-2">Shipment Information</h3>
                                <ul class="list-unstyled">
                                    <li>Origin: <span class="font-weight-bold">{{ $courier->origin }}</span></li>
                                    <li>Destination: <span class="font-weight-bold">{{ $courier->destination }}</span></li>
                                    <li>Carrier: <span class="font-weight-bold">{{ $courier->carrier }}</span></li>
                                    <li>Shipment Method: <span class="font-weight-bold">{{ $courier->shipment_method }}</span>
                                    </li>
                                    <li>Payment Method: <span class="font-weight-bold">{{ $courier->payment_method }}</span>
                                    </li>
                                    <li>Shipping Address: <span class="font-weight-bold">{{ $courier->shipping_address }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 text-dark border-light p-4 rounded">
                                <h3 class="h5 font-weight-medium mb-2">Sender Information</h3>
                                <ul class="list-unstyled">
                                    <li>Full Name: <span class="font-weight-bold">{{ $courier->sender->fullname }}</span></li>
                                    <li>Email: <span class="font-weight-bold">{{ $courier->sender->email }}</span></li>
                                    <li>Phone Number: <span class="font-weight-bold">{{ $courier->sender->phone_number }}</span>
                                    </li>
                                    <li>Address: <span class="font-weight-bold">{{ $courier->sender->address }}</span></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 text-dark border-light p-4 rounded">
                                <h3 class="h5 font-weight-medium mb-2">Recipient Information</h3>
                                <ul class="list-unstyled">
                                    <li>Full Name: <span class="font-weight-bold">{{ $courier->recipient->fullname }}</span>
                                    </li>
                                    <li>Email: <span class="font-weight-bold">{{ $courier->recipient->email }}</span></li>
                                    <li>Phone Number: <span
                                            class="font-weight-bold">{{ $courier->recipient->phone_number }}</span></li>
                                    <li>Address: <span class="font-weight-bold">{{ $courier->recipient->address }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-dark border-light p-4 rounded mt-4">
                            <h3 class="h5 font-weight-medium mb-2">Additional Information</h3>
                            <p class="mb-2">{{ $courier->description }}</p>
                            @if ($courier->pickup_time)
                                <p>Pickup Time: <span class="font-weight-bold">{{ $courier->pickup_time }}</span></p>
                            @endif

                            @if ($courier->delivery_date)
                                <p>Delivery Date: <span class="font-weight-bold">{{ $courier->delivery_date }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>

                @if(isset($courier->package_image))
                    <div class="container-md">
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $courier->package_image) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                @endif

                <div class="container-md d-flex justify-content-end mt-3">
                    <button onClick="downloadPDF('{{ $courier->tracking_id }}')" class="btn btn-primary">Download PDF</button>
                </div>

        @else
            <div class="container-md">
                @error('id')
                    <p class="text-center text-dark mt-2">
                        {{ $message }}
                        <br>
                        <a href="/" class="text-primary text-sm font-weight-bold">Go Back</a>
                    </p>
                @enderror
            </div>
        @endif

    </div>
</div>

@if(isset($loc))
    <script>
        var map;
        const styles = [
            'RoadOnDemand',
            'Aerial',
            'AerialWithLabelsOnDemand',
            'CanvasDark',
        ];

        const layers = styles.map(style => new ol.layer.Tile({
            source: new ol.source.BingMaps({
                key: 'Alq6pLB5tV2LPwxr5RuilK_i30Z49kg0FxThuJk7apM7BxSKrutiwPdF4lv4jm1R',
                imagerySet: style
            })

        }));

        function initMap() {

            const location = [{{ $loc->lng }}, {{ $loc->lat }}];

            const view = new ol.View({
                center: ol.proj.fromLonLat(location), // Initial center (you can set default coordinates)
                zoom: 17
            })

            map = new ol.Map({
                target: 'map-container',
                layers: layers,
                view: view
            });

            var svg = '<svg width="120" height="120" version="1.1" xmlns="http://www.w3.org/2000/svg">'
                + '<circle cx="60" cy="60" r="60"/>'
                + '</svg>';


            var markerStyle = new ol.style.Style({
                image: new ol.style.Icon({
                    opacity: 1,
                    // src: 'https://upload.wikimedia.org/wikipedia/commons/8/88/Map_marker.svg',
                    src: 'https://maps.google.com/mapfiles/kml/paddle/red-blank.png',
                    anchor: [0.5, 1],
                    scale: 0.5
                })
            });

            var markerFeature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(location))
            })

            markerFeature.setStyle(markerStyle);

            var markerLayer = new ol.layer.Vector({
                source: new ol.source.Vector({
                    features: [
                        markerFeature
                    ]
                })
            });

            map.addLayer(markerLayer);
        }

        const select = document.getElementById('layer-select');
        function onChange() {
            const style = select.value;
            for (let i = 0, ii = layers.length; i < ii; ++i) {
                layers[i].setVisible(styles[i] === style);
            }
        }
        select.addEventListener('change', onChange);
        onChange();

        initMap();
    </script>
@endif
@endsection