@extends('layouts.app')

@section('title', 'Grafico Ordini')

@section('content')
<div>
  <canvas id="ordersChart" class="container mt-5"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('ordersChart').getContext('2d');
  
  // Passa i dati al grafico
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($labels) !!},
      datasets: [{
        label: 'Numero ordini',
        data: {!! json_encode($data) !!},
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
      }
    }
  });
</script>

@endsection
