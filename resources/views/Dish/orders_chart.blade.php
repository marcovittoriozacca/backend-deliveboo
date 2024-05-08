@extends('layouts.app')

@section('title', 'Grafico Ordini')

@section('content')
<h2 class="text-center pt-5">Ordini degli ultimi 12 mesi</h2>
<div>
  <canvas id="ordersChart" class="w-75 mx-auto mt-1"></canvas>
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
         backgroundColor: Array.from({ length: {!! count($ordersLabels) !!} }, () => generateRandomColor()), // Colore di sfondo generato casualmente per ogni barra
        borderColor: 'Black', // Colore del bordo
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
      barPercentage: .2, //larghezza delle colonne
    }
  });

</script>

@endsection
