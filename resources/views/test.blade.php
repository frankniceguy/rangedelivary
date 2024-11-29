<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quick Start</title>
    <script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
    <link href="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/ol-geocoder/dist/ol-geocoder.js"></script>

  </head>
  <body>
    <div id="map-container" style="width: 100%; height: 400px;"></div>
    <select id="layer-select">
      <option selected value="RoadOnDemand">Road</option>
      <option value="Aerial">Aerial</option>
      <option value="AerialWithLabelsOnDemand">Aerial with labels</option>
      <option value="CanvasDark">Road dark</option>
    </select>

    <script>
      var map;
      const styles = [
        'RoadOnDemand',
        'Aerial',
        'AerialWithLabelsOnDemand',
        'CanvasDark',
      ];

      const geocoder = new Geocoder('nominatim', {
        provider: 'mapquest',
        key: '__some_key__',
        lang: 'en-U', //en-US, fr-FR
        placeholder: 'Search for ...',
        targetType: 'text-input',
        limit: 5,
        keepOpen: true
      });

      geocoder.on('addresschosen', (evt) => {
        const feature = evt.feature,
          coord = evt.coordinate,
          address = evt.address;
        // some popup solution
        content.innerHTML = '<p>' + address.formatted + '</p>';
        overlay.setPosition(coord);
      });
      
      const layers = styles.map(style => new ol.layer.Tile({
          source: new ol.source.BingMaps({
            key: 'Alq6pLB5tV2LPwxr5RuilK_i30Z49kg0FxThuJk7apM7BxSKrutiwPdF4lv4jm1R',
            imagerySet: style
          })
      }));

      function initMap() {
          map = new ol.Map({
              target: 'map-container',
              layers: layers,
              view: new ol.View({
                  center: [0, 0], // Initial center (you can set default coordinates)
                  zoom: 2
              })
          });

          map.addControl(geocoder);


          map.on('click',(event) => {
            const point = map.getCoordinateFromPixel(event.pixel);
          });



          var marker = new ol.Feature({ // Marker for user selection
              geometry: new ol.geom.Point([0, 0]) // Initial position
          });

          var markerSource = new ol.source.Vector({
              features: [marker]
          });

          var markerLayer = new ol.layer.Vector({
              source: markerSource
          });

          // map.addLayer(markerLayer);

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
  </body>
</html>