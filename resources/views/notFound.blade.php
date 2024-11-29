
@section('content')
<script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
<link href="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.js"></script>

<div class="flex items-center justify-center min-h-[10rem] flex-col bg-white py-[2rem]">
  <div class="md:w-[80%] w-full text-gray-800 p-5 py-12 mt-2 h-full rounded  mx-auto">

    <div class="w-full">
      @error('id')
      <p class="text-gray-800 text-center text-xl mt-2 px-2">
      {{ $message }}
      <br>
      <a href="/" class="text-main text-sm font-[500]">Go Back</a>
      </p>
    @enderror
    </div>

  </div>
</div>




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
@endsection