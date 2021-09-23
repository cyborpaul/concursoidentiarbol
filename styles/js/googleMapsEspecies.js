    $('window').ready(cargarEventosGoogleMapsEspecies)

    var GoogleMap
    var especiePost

    function cargarEventosGoogleMapsEspecies(){
        GoogleMap = new GMaps({
          div: '#map',
          lat: -3.74912,
          lng: -73.25383,
          mapTypeId: 'satellite'
        });

      GoogleMap.setZoom(20)

      GoogleMap.on("load", getMarkersCoord(especiePost));

    }

    function getMarkersCoord(nombreComun="")
    {
      let url = "googleMaps.Ajax.php"
      let data = {
        'nombreComun' : nombreComun 
        }

      let type = "POST"
      let dataType = "json"


      error = function(rpta){EC_getMarkersCoord(rpta)}
      beforeSend = function(rpta){BS_getMarkersCoord()}
      success = function(rpta){S_getMarkersCoord(rpta)}
      
      /*=====  End of Declaracion de variables y metodos de envio  ======*/

      /* Enviamos los datos al archivo ajax */
      $.ajax({data, dataType, url, type, error, success, beforeSend})
    }

    function EC_getMarkersCoord(rpta)
    {
      var GoogleMap = new GMaps({
          div: '#map',
          lat: -3.733333,
          lng: -73.25383,
          mapTypeId: 'satellite'
        });
    }
    function BS_getMarkersCoord()
    {
    }
    function S_getMarkersCoord(rpta)
    {
      //console.log(rpta)
      var GoogleMap = new GMaps({
          div: '#map',
          lat: -3.74912,
          lng: -73.25383,
          mapTypeId: 'satellite'
        });

      let especies = rpta

      //dibujarBasura(GoogleMap)

      for (especie in especies) {
        GoogleMap.addMarker({ 
          lat: especies[especie]['COORDENADA_X'],
          lng: especies[especie]['COORDENADA_Y'],
          title: especies[especie]['NOMBRE_COMUN'],
          
          infoWindow: {
            content: '<center><img src="https://www.identiarbol.org/Practica/Practica/PAGINA/php_Menu/subidas/'+especies[especie]['nombre']+'"  style="width:100px; height:100px;"></center><a href="index.php?c=Index&a=mostrar_imagen&ID='+especies[especie]['ID']+'&especie='+especies[especie]['ID_taxonomia']+'&Taxonomia='+especies[especie]['ID_taxonomia']+'"> Especie: '+especies[especie]['NOMBRE_CIENTIFICO']+' <br> Calle: '+especies[especie]['CALLE']+' <br> Código P: '+especies[especie]['ID']+'</a>'
            
          }
        });
      }
    }

    function dibujarBasura(googleMaps)
    {

      //LAS COORDENADAS DEBEN ESTÁR EN ORDEN
      let coordenadas =[[-3.7582542,-73.271336277777778], [-3.7578461,-73.27433222222223], [-3.7258542,-73.255749176], [-3.7336186,-73.25429361111111], [-3.7419211,-73.24281833333333], [-3.7433631,-73.24188444444445],[-3.74912,-73.253833333],[-3.7571622,-73.247218055555]]

      //DIBUJAMOS EL POLIGONO
      /*polygon = googleMaps.drawPolygon({
      paths: coordenadas, // pre-defined polygon shape
      strokeColor: "red",
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: "red",
      fillOpacity: 0.6
        });*/

      for (c in coordenadas) {
        googleMaps.addMarker({ 
          lat: coordenadas[c][0],
          lng: coordenadas[c][1],
          title: "Punto Limitrofe",
        });
      }
    }