<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3 py-3">
            <div class="card shadow">
                <div class="card-tittle text-center mt-2">
                    <h4>PETA PERSEBARAN LLAJ KOTA MADIUN</h4>
                </div>
                <div class="card-body bg-light">
                    <div id="map" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Google layers
    var g_roadmap = new L.Google('ROADMAP');
    var g_satellite = new L.Google('SATELLITE');
    var g_terrain = new L.Google('TERRAIN');

    // OSM layers
    var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
    var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
    var osm = new L.TileLayer(osmUrl, {
        attribution: osmAttrib
    });

    // Bing layers
    var bing1 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {
        type: 'Aerial'
    });
    var bing2 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {
        type: 'Road'
    });

    // Sao Paulo Soybeans Plant
    var soybeans_sp = new L.LayerGroup();
    L.marker([-22, -49.80]).addTo(soybeans_sp),
        L.marker([-23, -49.10]).addTo(soybeans_sp),
        L.marker([-21, -49.50]).addTo(soybeans_sp);

    // Sao Paulo Corn Plant
    var corn_sp = new L.LayerGroup();
    L.marker([-22, -48.10]).addTo(corn_sp),
        L.marker([-21, -48.60]).addTo(corn_sp);

    // Rio de Janeiro Bean Plant
    var bean_rj = new L.LayerGroup();
    L.marker([-22, -42.10]).addTo(bean_rj),
        L.marker([-23, -42.78]).addTo(bean_rj);

    // Rio de Janeiro Corn Plant
    var corn_rj = new L.LayerGroup();
    L.marker([-22, -43.20]).addTo(corn_rj),
        L.marker([-23, -43.50]).addTo(corn_rj);

    // Rio de Janeiro Rice Plant
    var rice_rj = new L.LayerGroup();
    L.marker([-22, -42.90]).addTo(rice_rj),
        L.marker([-22, -42.67]).addTo(rice_rj),
        L.marker([-23, -42.67]).addTo(rice_rj);

    // Belo Horizonte Sugar Cane Plant
    var sugar_bh = new L.LayerGroup();
    L.marker([-19, -44.90]).addTo(sugar_bh),
        L.marker([-19, -44.67]).addTo(sugar_bh);

    // Belo Horizonte Corn Plant
    var corn_bh = new L.LayerGroup();
    L.marker([-19.45, -45.90]).addTo(corn_bh),
        L.marker([-19.33, -45.67]).addTo(corn_bh);


    var map = L.map('map', {
        center: [-16, -54],
        zoom: 4
    });

    map.addLayer(bing2);

    var baseMaps = [{
            groupName: "Google Base Maps",
            expanded: true,
            layers: {
                "Satellite": g_satellite,
                "Road Map": g_roadmap,
                "Terreno": g_terrain
            }
        }, {
            groupName: "OSM Base Maps",
            layers: {
                "OpenStreetMaps": osm
            }
        }
        /*, {
                                    groupName : "Bing Base Maps",
                                    layers    : {
                                        "Satellite" : bing1,
                                        "Road"      : bing2
                                  }
                                } */
    ];

    var overlays = [{
        groupName: "Sao Paulo",
        expanded: true,
        layers: {
            "Soybeans Plant": soybeans_sp,
            "Corn Plant": corn_sp
        }
    }, {
        groupName: "Rio de Janeiro",
        expanded: true,
        layers: {
            "Bean Plant": bean_rj,
            "Corn Plant": corn_rj,
            "Rice Plant": rice_rj
        }
    }, {
        groupName: "Belo Horizonte",
        layers: {
            "Sugar Cane Plant": sugar_bh
        }
    }];

    // configure StyledLayerControl options for the layer soybeans_sp
    soybeans_sp.StyledLayerControl = {
        removable: true,
        visible: false
    }

    // configure the visible attribute with true to corn_bh
    corn_bh.StyledLayerControl = {
        removable: false,
        visible: true
    }

    var options = {
        container_width: "300px",
        group_maxHeight: "80px",
        //container_maxHeight : "350px", 
        exclusive: false,
        collapsed: true,
        position: 'topright'
    };

    var control = L.Control.styledLayerControl(baseMaps, overlays, options);
    map.addControl(control);

    // test for adding new base layers dynamically
    // to create a new group simply add a layer with new group name
    control.addBaseLayer(bing1, "Bing Satellite", {
        groupName: "Bing Maps",
        expanded: true
    });
    control.addBaseLayer(bing2, "Bing Road", {
        groupName: "Bing Maps"
    });

    // test for adding new overlay layers dynamically
    control.addOverlay(corn_bh, "Corn Plant", {
        groupName: "Belo Horizonte"
    });

    //control.removeLayer( corn_sp );

    //control.removeGroup( "Rio de Janeiro");

    control.selectLayer(corn_sp);
    //control.unSelectLayer(corn_sp); 

    control.selectGroup("Rio de Janeiro");
    //control.unSelectGroup("Rio de Janeiro");

    var popup = L.popup()
        .setLatLng([-16, -54])
        .setContent("The data that appears in this application are fictitious and do not represent actual data!")
        .openOn(map);
</script>