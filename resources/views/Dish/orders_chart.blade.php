@extends('layouts.app')

@section('title', 'Grafico Ordini')

@section('content')
<h2 class="text-center pt-5">Ordini al mese</h2>
<div>
  <canvas id="ordersChart" class="w-75 mx-auto mt-1"></canvas>
</div>
<hr class="w-75 m-auto border border-warning border-2 opacity-50 mt-5">
<h2 class="text-center pt-5">Ordini per orario</h2>
<div>
  <canvas id="hoursChart" class="w-75 mx-auto mt-1"></canvas>
</div>
<hr class="w-75 m-auto border border-warning border-2 opacity-50 mt-5">
<h2 class="text-center pt-5">Ordini per piatto</h2>
<div>
  <canvas id="dishesChart" class="w-75 mx-auto mt-1"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  function generateRandomColor() {
      return '#' + Math.floor(Math.random()*16777215).toString(16);
  }

  const ordersChart = document.getElementById('ordersChart').getContext('2d');
  
  // Passa i dati al grafico
  new Chart(ordersChart, {
    type: 'bar',
    data: {
      labels: {!! json_encode($ordersLabels) !!},
      datasets: [{
        label: 'Totale ordini anno/mese',
        data: {!! json_encode($ordersData) !!},
        backgroundColor: 'rgba(245, 129, 21, 0.8)', // Colore di sfondo
        borderColor: 'rgba(245, 129, 21, 1)', // Colore del bordo
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1 //1 serve a visualizzare solo i numeri interi
        }
      },
      barPercentage: 0.1, //larghezza delle colonne
    }
  });

  const dishesChart = document.getElementById('dishesChart').getContext('2d');
  
  let dishesRandomColors = [];
  for (var i = 0; i < {!! count($dishesLabels) !!}; i++) {
      dishesRandomColors.push(generateRandomColor());
  }

  // Passa i dati al grafico
  new Chart(dishesChart, {
    type: 'bar',
    data: {
      labels: {!! json_encode($dishesLabels) !!},
      datasets: [{
        label: 'Numero ordini per ogin piatto',
        data: {!! json_encode($dishesData) !!},
        backgroundColor: dishesRandomColors, // Colore di sfondo
        borderColor: 'rgba(245, 129, 21, 1)', // Colore del bordo
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1 //1 serve a visualizzare solo i numeri interi
        }
      },
      barPercentage: 0.4, //larghezza delle colonne
    }
  });


  const hoursChart = document.getElementById('hoursChart').getContext('2d');
  
  // Passa i dati al grafico
  new Chart(hoursChart, {
    type: 'bar',
    data: {
      labels: {!! json_encode($hoursLabels) !!},
      datasets: [{
        label: 'Numero ordini per orario',
        data: {!! json_encode($hoursData) !!},
        backgroundColor: 'rgba(245, 129, 21, 0.8)', // Colore di sfondo
        borderColor: 'rgba(245, 129, 21, 1)', // Colore del bordo
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1 //1 serve a visualizzare solo i numeri interi
        }
      },
      barPercentage: 0.6, //larghezza delle colonne
    }
  });

</script>

@endsection
