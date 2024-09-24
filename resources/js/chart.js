import Chart from "chart.js/auto";
async function initChart(){

    const ctx = document.getElementById('myChart');

    const response = await fetch("http://localhost:8000/api/members");
    const data = await response.json()

    const active_members = filterBy(data , 'active')

    const deceased_members = filterBy(data , 'dead')

    const penalized_members = filterBy(data , 'penalized')

    const chart2 = document.getElementById('chart2');

    const months  = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];



    new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Active', 'Deceased' , 'Penalzed' ],
          datasets: [{
            label: '# of Status',
            data: [active_members.length,deceased_members.length,penalized_members.length],
            borderWidth: 1
          }]
        },
        options: {


          plugins:{
            title:{
                display:true,
                text: "Member Status",
                font:{
                    size:24
                },
                padding:{
                    top:10,
                    bottom:30
                }
            }
          }

        }
      });


      new Chart(chart2, {
        type: 'bar',
        data: {
          labels: ['Active', 'Penalzed' ],
          datasets: [{
            label: '# of Status',
            data: [active_members.length,penalized_members.length],
            borderWidth: 1
          }]
        },
        options: {

          scales: {
            y: {
              beginAtZero: true
            },
            x:{

            }
          },
          plugins:{
            title:{
                display:true,
                text: "Penalized Members Vs Active Members",
                font:{
                    size:24
                },
                padding:{
                    top:10,
                    bottom:30
                }
            }
          }

        }
      });
}


initChart();

function filterBy(data , condition_property){
    return data.filter((d) => d.status == condition_property)
}








