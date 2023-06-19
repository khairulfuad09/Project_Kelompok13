/* globals Chart:false, feather:false */

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          boxPadding: 3
        }
      }
    }
  })
})()

const buttons_dashboard = document.querySelector('.button-dashboard');
const buttons_order = document.querySelector('.button-orders');
const buttons_product = document.querySelector('.button-product');
const buttons_customer = document.querySelector('.button-customer');
const buttons_report = document.querySelector('.button-report');
const buttons_integration = document.querySelector('.button-integration');
const buttons_dataUser = document.querySelector('.button-dataUser');
const buttons_dataPenjual = document.querySelector('.button-dataPenjual');
const buttons_dataBibit = document.querySelector('.button-dataBibit');
const buttons_dataPesanan = document.querySelector('.button-dataPesanan');



buttons_dashboard.addEventListener('click', ()=>{
  buttons_dashboard.classList.add('active');
})
buttons_order.addEventListener('click', ()=>{
  buttons_order.classList.add('active');
  buttons_dashboard.classList.remove('active');
})

// buttons.forEach(button => {
//   button.addEventListener('click', () => {
//     // tambahkan kelas "active" ke tombol yang ditekan
//     button.classList.add('active');

//     // hapus kelas "active" dari tombol yang lain
//     buttons.forEach(otherButton => {
//       if (otherButton !== button) {
//         otherButton.classList.remove('active');
//       }
//     });
//   });
// });
