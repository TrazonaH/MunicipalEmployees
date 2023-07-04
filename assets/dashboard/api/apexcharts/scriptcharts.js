document.addEventListener("DOMContentLoaded", (event) => {
  // log.textContent += `DOMContentLoaded\n`;
  console.log("page is fully loaded");
  var options = {
    series: [{
    name: 'Sales',
    data: []
  }],
    chart: {
    height: 350,
    type: 'bar',
  },
  plotOptions:{
    bar:{
      horizontal: false,
      borderRadius: 0,
      distributed: true,
    }
  },
  stroke: {
    width: 7,
    curve: 'smooth'
  },
  xaxis: {
    // type: ,
    categories: [],
  },
  title: {
    text: 'Users',
    align: 'left',
    style: {
      fontSize: "16px",
      color: '#666'
    }
  },
  markers: {
    size: 4,
    colors: ["#FFA41B"],
    strokeColors: "#fff",
    strokeWidth: 2,
    hover: {
      size: 7,
    }
  },
  yaxis: {
    // opposite: true,
    min: 0,
    max: 1000,
    title: {
      text: 'Engagements',
    },
  }
};
const data = new FormData();
 data.append("fn","monthlySales");
 axios.post('api/transaction_api.php',data)
 .then(function (r){
  let array_month = ["","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
     for(let i =0; i<r.data.length; i++){
      var total_amount = parseInt(r.data[i].total_amount_month);
      var date_month = r.data[i].month.slice(1);
      options.series[0].data.push(total_amount);
      options.xaxis.categories.push(array_month[date_month]);
     }
     
     var chart = new ApexCharts(document.querySelector("#chart-4"), options);
    chart.render();
 })
});
document.addEventListener("DOMContentLoaded", (event) => {
var options = {
  chart: {
     
      height: 200,
      type: 'radialBar',
  },
  plotOptions: {
    radialBar: {
      hollow: {
         background: '#B4E4FF',
        // margin: 15,
        // size: "70%"
      },
      track:{
        background: '#B4E4FF',
        
      },
     
      dataLabels: {
        name: {
          show: false,
        },
        value: {
          color: "#111",
          fontWeight:  'bold',
          alignt: 'center',
          fontSize: "25px",
          show: true
        }
      }
    }
  },
  
  series: [],
  labels: ['Progress'],
};

const data = new FormData();
data.append("fn","availableProducts");
 axios.post('api/product_api.php',data)
 .then(function(r){
    // let act = 2 / 100;
    console.log(r.data[0].pro_len);
    options.series.push(((r.data[0].active/r.data[0].pro_len)*100).toFixed(1));
    // var datas = ((r.data[0].active/r.data[0].pro_len)*100).toFixed(1)
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    // chart.update();
    chart.render();
 });
});




  

