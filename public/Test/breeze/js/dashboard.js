(function($) {
  'use strict';
  if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
  }
  if($("#business-survey-chart").length) {
    var businessSurveyData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
          label: "automobiles",
          data: [
              -60, 70, -20, 40, 0, 60
          ],
          backgroundColor: '#f86c6b',
          borderColor: '#f86c6b',
          fill: false,
          borderDash: [3, 3],
          pointRadius: 5,
          pointHoverRadius: 5,
          borderWidth: 2
        }, {
          label: "Electronics",
          data: [
              60, -40, 0, 80, 40, -20, 80
          ],
          backgroundColor: '#20a8d8',
          borderColor: '#20a8d8',
          fill: false,
          borderDash: [3, 3],
          pointRadius: 5,
          pointHoverRadius: 5,
          borderWidth: 2
        }, {
          label: "Beverages",
          data: [
              -20, 0, 40, -60, 60, 0, -100
          ],
          backgroundColor: '#4cc47f',
          borderColor: '#4cc47f',
          fill: false,
          pointRadius: 5,
          pointHoverRadius: 5,
          borderWidth: 2
        }, {
          label: "Accessories",
          data: [
              100, 20, 0, -20, 40, 20, 60
          ],
          backgroundColor: '#f8cb00',
          borderColor: '#f8cb00',
          fill: false,
          pointRadius: 5,
          pointHoverRadius: 5,
          borderWidth: 2
      }]
    };
    var businessSurveyOptions = {
      responsive: true,
      legend: {
          position: 'bottom',
      },
      hover: {
          mode: 'index'
      },
      scales: {
          xAxes: [{
              display: true,
              scaleLabel: {
                  display: true,
                  labelString: 'Month'
              }
          }],
          yAxes: [{
              display: true,
              scaleLabel: {
                  display: true,
                  labelString: 'Value'
              }
          }]
      },
    }
    var businessSurveyCanvas = $("#business-survey-chart").get(0).getContext("2d");
    var lineChart = new Chart(businessSurveyCanvas, {
      type: 'line',
      data: businessSurveyData,
      options: businessSurveyOptions
    });

  }
  if($('#visits-map').length) {
    $('#visits-map').vectorMap({
      map: 'world_mill_en',
      backgroundColor: '#FFF',
      scaleColors: ['#C8EEFF', '#0071A4'],
      zoomOnScroll: false,
      normalizeFunction: 'polynomial',
      hoverOpacity: 0.7,
      hoverColor: false,
      markerStyle: {
        initial: {
          fill: '#4db9ed',
          stroke: 'none'
        }
      },
      markers: [
        {latLng: [41.90, 12.45], name: 'Vatican City'},
        {latLng: [43.73, 7.41], name: 'Monaco'},
        {latLng: [43.93, 12.46], name: 'San Marino'},
        {latLng: [3.2, 73.22], name: 'Maldives'},
        {latLng: [35.88, 14.5], name: 'Malta'},
        {latLng: [12.05, -61.75], name: 'Grenada'},
        {latLng: [13.16, -59.55], name: 'Barbados'},
        {latLng: [-4.61, 55.45], name: 'Seychelles'},
        {latLng: [42.5, 1.51], name: 'Andorra'},
        {latLng: [15.3, -61.38], name: 'Dominica'},
        {latLng: [-20.2, 57.5], name: 'Mauritius'},
        {latLng: [26.02, 50.55], name: 'Bahrain'},
        {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
      ],
      regionStyle: {
        initial: {
          fill: 'white',
          "fill-opacity": 1,
          stroke: '#eaeef0',
          "stroke-width": 1,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8,
          cursor: 'pointer'
        },
        selected: {
          fill: '#4db9ed'
        },
        selectedHover: {
        }
      }
    });

  }
})(jQuery);
