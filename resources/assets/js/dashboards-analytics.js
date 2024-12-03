/**
 * Dashboard Analytics
 */

document.forms['userForm'].reset();

// $('#kecSelect').on('change', function() {
//   $('#kecForm').find('[name="_token"]').remove();
//   $('#pasarHidden').val($('#pasarSelect').val())
//   $('#kecForm').submit();
// });

$('#pasarSelect').on('change', function() {
  $('#pasarForm').find('[name="_token"]').remove();
  // $('#kecHidden').val($('#kecSelect').val())
  $('#pasarForm').submit();
});

'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor, months, arr, bulan;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;
  months = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

  data_selancar = selancar.map(({harga}) => (harga));
  data_topi_koki = topi_koki.map(({harga}) => (harga));
  data_ayam = ayam.map(({harga}) => (harga));
  data_sapi = sapi.map(({harga}) => (harga));
  data_merah_besar = merah_besar.map(({harga}) => (harga));
  data_merah_keriting = merah_keriting.map(({harga}) => (harga));
  data_rawit_merah = rawit_merah.map(({harga}) => (harga));
  data_rawit_hijau = rawit_hijau.map(({harga}) => (harga));
  data_psm = psm.map(({harga}) => (harga));
  data_gulaku = gulaku.map(({harga}) => (harga));
  data_tropical = tropical.map(({harga}) => (harga));
  data_fortune = fortune.map(({harga}) => (harga));

  bulan_selancar = selancar.map(({bulan}) => (bulan)); 
  bulan_topi_koki = topi_koki.map(({bulan}) => (bulan));
  bulan_ayam = ayam.map(({bulan}) => (bulan));
  bulan_sapi = sapi.map(({bulan}) => (bulan));
  bulan_merah_besar = merah_besar.map(({bulan}) => (bulan));
  bulan_merah_keriting = merah_keriting.map(({bulan}) => (bulan));
  bulan_rawit_merah = rawit_merah.map(({bulan}) => (bulan));
  bulan_rawit_hijau = rawit_hijau.map(({bulan}) => (bulan));
  bulan_psm = psm.map(({bulan}) => (bulan));
  bulan_gulaku = gulaku.map(({bulan}) => (bulan));
  bulan_tropical = tropical.map(({bulan}) => (bulan));
  bulan_fortune = fortune.map(({bulan}) => (bulan));

  for (var i = 0; i < bulan_selancar.length; ++i) {
    bulan_selancar[i] = months[bulan_selancar[i]];
  } 
  for (var i = 0; i < bulan_topi_koki.length; ++i) {
    bulan_topi_koki[i] = months[bulan_topi_koki[i]];
  } 
  for (var i = 0; i < bulan_ayam.length; ++i) {
    bulan_ayam[i] = months[bulan_ayam[i]];
  } 
  for (var i = 0; i < bulan_sapi.length; ++i) {
    bulan_sapi[i] = months[bulan_sapi[i]];
  } 
  for (var i = 0; i < bulan_merah_besar.length; ++i) {
    bulan_merah_besar[i] = months[bulan_merah_besar[i]];
  } 
  for (var i = 0; i < bulan_merah_keriting.length; ++i) {
    bulan_merah_keriting[i] = months[bulan_merah_keriting[i]];
  } 
  for (var i = 0; i < bulan_rawit_merah.length; ++i) {
    bulan_rawit_merah[i] = months[bulan_rawit_merah[i]];
  } 
  for (var i = 0; i < bulan_rawit_hijau.length; ++i) {
    bulan_rawit_hijau[i] = months[bulan_rawit_hijau[i]];
  } 
  for (var i = 0; i < bulan_psm.length; ++i) {
    bulan_psm[i] = months[bulan_psm[i]];
  } 
  for (var i = 0; i < bulan_gulaku.length; ++i) {
    bulan_gulaku[i] = months[gulaku[i]];
  } 
  for (var i = 0; i < bulan_tropical.length; ++i) {
    bulan_tropical[i] = months[tropical[i]];
  } 
  for (var i = 0; i < bulan_fortune.length; ++i) {
    bulan_fortune[i] = months[fortune[i]];
  } 

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_ayam
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_ayam,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  const sapiChartEl = document.querySelector('#sapiChart'),
    sapiChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_sapi
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_sapi,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof sapiChartEl !== undefined && sapiChartEl !== null) {
    const sapiChart = new ApexCharts(sapiChartEl, sapiChartOptions);
    sapiChart.render();
  }

  const cabeBesarChartEl = document.querySelector('#cabeBesarChart'),
    cabeBesarChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_merah_besar
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_merah_besar,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof cabeBesarChartEl !== undefined && cabeBesarChartEl !== null) {
    const cabeBesarChart = new ApexCharts(cabeBesarChartEl, cabeBesarChartOptions);
    cabeBesarChart.render();
  }

  const cabeKeritingChartEl = document.querySelector('#cabeKeritingChart'),
    cabeKeritingChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_merah_keriting
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_merah_keriting,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof cabeKeritingChartEl !== undefined && cabeKeritingChartEl !== null) {
    const cabeKeritingChart = new ApexCharts(cabeKeritingChartEl, cabeKeritingChartOptions);
    cabeKeritingChart.render();
  }
  
  const cabeRawitHijauChartEl = document.querySelector('#cabeRawitHijauChart'),
    cabeRawitHijauChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_rawit_hijau
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_rawit_hijau,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof cabeRawitHijauChartEl !== undefined && cabeRawitHijauChartEl !== null) {
    const cabeRawitHijauChart = new ApexCharts(cabeRawitHijauChartEl, cabeRawitHijauChartOptions);
    cabeRawitHijauChart.render();
  }

  const cabeRawitMerahChartEl = document.querySelector('#cabeRawitMerahChart'),
    cabeRawitMerahChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_rawit_merah
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_rawit_merah,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof cabeRawitMerahChartEl !== undefined && cabeRawitMerahChartEl !== null) {
    const cabeRawitMerahChart = new ApexCharts(cabeRawitMerahChartEl, cabeRawitMerahChartOptions);
    cabeRawitMerahChart.render();
  }

  const psmChartEl = document.querySelector('#psmChart'),
    psmChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_psm
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_psm,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof psmChartEl !== undefined && psmChartEl !== null) {
    const psmChart = new ApexCharts(psmChartEl, psmChartOptions);
    psmChart.render();
  }

   const gulakuChartEl = document.querySelector('#gulakuChart'),
    gulakuChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_gulaku
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_gulaku,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof gulakuChartEl !== undefined && gulakuChartEl !== null) {
    const gulakuChart = new ApexCharts(gulakuChartEl, gulakuChartOptions);
    gulakuChart.render();
  }

   const tropicalChartEl = document.querySelector('#tropicalChart'),
    tropicalChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_tropical
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_tropical,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof tropicalChartEl !== undefined && tropicalChartEl !== null) {
    const tropicalChart = new ApexCharts(tropicalChartEl,tropicalChartOptions);
    tropicalChart.render();
  }

  const fortuneChartEl = document.querySelector('#fortuneChart'),
    fortuneChartOptions = {
      series: [
        {
          name: "Harga",
          data: data_fortune
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_fortune,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };
  if (typeof fortuneChartEl !== undefined && fortuneChartEl !== null) {
    const fortuneChart = new ApexCharts(fortuneChartEl,fortuneChartOptions);
    fortuneChart.render();
  }

  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [78],
      labels: ['Growth'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: cardColor,
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }

  // Profit Report Line Chart
  // --------------------------------------------------------------------
  const profileReportChartEl = document.querySelector('#profileReportChart'),
    profileReportChartConfig = {
      series: [
        {
          name: "Harga",
          data: data_topi_koki
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        // discrete: [
        //   {
        //     fillColor: config.colors.white,
        //     seriesIndex: 0,
        //     dataPointIndex: data_telur.length - 1,
        //     strokeColor: config.colors.primary,
        //     strokeWidth: 2,
        //     size: 6,
        //     radius: 8
        //   }
        // ],
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_topi_koki,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        tickAmount: 4
      }
    };
  if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
    const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
    profileReportChart.render();
  }

  // Order Statistics Chart
  // --------------------------------------------------------------------
  const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
    orderChartConfig = {
      chart: {
        height: 165,
        width: 130,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [85, 15, 50, 50],
      colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
      stroke: {
        width: 5,
        colors: [cardColor]
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      },
      states: {
        hover: {
          filter: { type: 'none' }
        },
        active: {
          filter: { type: 'none' }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '75%',
            labels: {
              show: true,
              value: {
                fontSize: '1.5rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                fontSize: '0.8125rem',
                color: axisColor,
                label: 'Weekly',
                formatter: function (w) {
                  return '38%';
                }
              }
            }
          }
        }
      }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }

  // Income Chart - Area chart
  // --------------------------------------------------------------------
  const incomeChartEl = document.querySelector('#incomeChart'),
    incomeChartConfig = {
      series: [
        {
          name: "Harga",
          data: data_selancar
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: config.colors.white,
        strokeColors: '#082c6c',
        strokeWidth: 4,
        hover: {
          size: 7
        }
      },
      colors: ['#082c6c'],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: bulan_selancar,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: '#082c6c'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        tickAmount: 4
      }
    };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
    const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }

  // Expenses Mini Chart - Radial Chart
  // --------------------------------------------------------------------
  const weeklyExpensesEl = document.querySelector('#expensesOfWeek'),
    weeklyExpensesConfig = {
      series: [65],
      chart: {
        width: 60,
        height: 60,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          startAngle: 0,
          endAngle: 360,
          strokeWidth: '8',
          hollow: {
            margin: 2,
            size: '45%'
          },
          track: {
            strokeWidth: '50%',
            background: borderColor
          },
          dataLabels: {
            show: true,
            name: {
              show: false
            },
            value: {
              formatter: function (val) {
                return '$' + parseInt(val);
              },
              offsetY: 5,
              color: '#697a8d',
              fontSize: '13px',
              show: true
            }
          }
        }
      },
      fill: {
        type: 'solid',
        colors: config.colors.primary
      },
      stroke: {
        lineCap: 'round'
      },
      grid: {
        padding: {
          top: -10,
          bottom: -15,
          left: -10,
          right: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
    const weeklyExpenses = new ApexCharts(weeklyExpensesEl, weeklyExpensesConfig);
    weeklyExpenses.render();
  }
})();
