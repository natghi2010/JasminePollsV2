
// if(navigator.geolocation){
//     console.log(window.navigator.geolocation
//         .getCurrentPosition(console.log));
// }else{
//     alert("Location Denied");
// }


window.addEventListener("DOMContentLoaded", event => {
  const audio = document.querySelector("audio");
  audio.volume = 1;
  audio.play();
});

var questions;

axios.get($("#masterUrl").val()+'/questions').then(data=>{
  questions = data.data;
  console.log('questions',questions);
  Survey
  .StylesManager
  .applyTheme("orange");
  
  var json = {
    questions : questions
  };

  
  window.survey = new Survey.Model(json);

  survey
      .onComplete
      .add(function (result) {
        $("#startbutton").trigger('click');
          document
              .querySelector('#surveyResult')
              .textContent = "Result JSON:\n" + JSON.stringify(result.data, null, 3);
      });
  
  $("#surveyElement").Survey({model: survey});
  
 });

 function openPage(page){
  window.location=$("#masterUrl").val()+"/subcity/"+page;
 }

 

 function openArea(type){
  window.location=$("#masterUrl").val()+"/"+type;
 }

var options = {
    series: [44, 55, 13, 43, 22],
    chart: {
    width: 380,
    type: 'pie',
  },
  labels: ['Yeka', 'Bole', 'Lideta', 'Kirkos', 'Arada'],
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chartPie"), options);
  chart.render();

  var options = {
    series: [{
      name: "አዴነች ተሾመች",
      data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
  },
  {
    name: "ከመሾሙ በፊት የማይረባው ሰው",
    data: [10, 31, 40, 31, 50, 21, 20, 10, 31]
}
],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'straight'
  },
  title: {
    text: 'Perfomance in Years',
    align: 'left'
  },
  grid: {
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  xaxis: {
    categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
  }
  };

  var chart = new ApexCharts(document.querySelector("#chartLine"), options);
  chart.render();

  var options = {
    series: [{
    name: 'መሬት',
    data: [1, 2, 3, 4, 5]
  }, {
    name: 'ንግድ',
    data: [5, 3, 2, 4, 5]
  }, {
    name: 'ገቢዎች',
    data: [5, 3, 3, 1, 5]
  },
  {
    name: 'ስራ አድል ፈጠራ',
    data: [5, 2, 1, 4, 5]
  },
  {
    name: 'ቤቶች',
    data: [5, 1, 3, 4, 5]
  },
  {
    name: 'ዳት',
    data: [5, 1, 3, 4, 5]
  },
  {
    name: 'ቅሬታና ኣቤቱታ',
    data: [5, 1, 3, 4, 5]
  },
{
  name: 'ወሳግን ኩነት',
  data: [5, 1, 3, 4, 5]
}
],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
  },
  yaxis: {
    title: {
      text: '$ (thousands)'
    }
  },
  fill: {
    opacity: 1
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " rating"
      }
    }
  }
  };
  var chart = new ApexCharts(document.querySelector("#chartbar"), options);
  chart.render();

var type = $("#type").val();
var area_id = $("#area_id").val();

  axios.get($("#masterUrl").val()+'/graphApi/subcity').then(resp=>{

    console.log(resp.data);
  
    var options = {
      series: [{
      name: 'Overall Satisfaction',
      data: resp.data.value
    }],
      annotations: {
      points: [{
        x: 'Bananas',
        seriesIndex: 0,
        label: {
          borderColor: '#775DD0',
          offsetY: 0,
          style: {
            color: '#fff',
            background: '#775DD0',
          },
          text: '',
        }
      }]
    },
    chart: {
      fontFamily: 'Amharic,MontserratLight',
      height: 350,
      type: 'bar',
    },
    plotOptions: {
      bar: {
        columnWidth: '50%'
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 2
    },
    
    grid: {
      row: {
        colors: ['#fff', '#f2f2f2']
      }
    },
    xaxis: {
      labels: {
        rotate: -45
      },
      categories: resp.data.key,
      tickPlacement: 'on'
    },
    yaxis: {
      title: {
        text: 'Overall Satisfcation',
      },
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: "horizontal",
        shadeIntensity: 0.25,
        gradientToColors: undefined,
        inverseColors: true,
        opacityFrom: 0.85,
        opacityTo: 0.85,
        stops: [50, 0, 100]
      },
    }
    };
    var chart = new ApexCharts(document.querySelector("#dashboardChart"), options);
    chart.render();
  });

 





//   $(document).ready(function(){
//     $('[data-toggle="tooltip"]').tooltip();
//   });