
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		
		<script src="script.js"></script>
     <style>
        .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 10px;
        border: 1px solid #ddd;
    }
    </style>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Concept Home</p>
				<p>Ma.Tharaadh / Sayyid <br>Kilegefaanu magu., <br>Male, Maldives</p>
				<p>+960 3331039</p>
			</address>
			<!-- <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span> -->
		</header>
		<article>
			<!-- <h1>Recipient</h1>
			<address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address><br><br> -->
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>{{ $order->order_no }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>{{ $order->created_at->format('d-m-Y') }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>
			</table><br><br>
			<table class="table">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
                @foreach ($order->orderItems as $item)
					<tr>
                    @php
                                            $images = json_decode($item->product->images);
                                            $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                        @endphp
						<td><a class="cut">-</a><span contenteditable>{{ $item->product->name }}</span></td>
						
						<td><span contenteditable>{{ $item->quantity }}</span></td>
						<td><span>${{ $item->total }}</span></td>
					</tr>
                @endforeach
				</tbody>
			</table><br><br>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span>{{ $order->grand_total }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable>0.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>$</span><span>0.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p> {{ $order->additional }}</p>
			</div>
		</aside>
	</body>
</html>

    
   
   