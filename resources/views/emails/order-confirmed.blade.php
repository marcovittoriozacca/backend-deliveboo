<h1>Ordine confermato!</h1>
<h4>Grazie {{ $order->full_name }} per averci scelto.</h4>

<h5>Il tuo ordine comprende:</h5>
<ul>
    @foreach ($cart as $plate)    
    <li>
        <p>
            {{ $plate['name'] }}
        </p>
        <span>
            x{{ $plate['quantity'] }} - {{ $plate['price'] }}€
        </span>
    </li>
    @endforeach
</ul>

<h4>Totale: {{ $order->total_price }}€</h4>