<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include ('elements.style-on-head')
    <style>
    	.img-center{
    		margin:0 auto;
    	}
    </style>
</head>

<body>
    <div class="container">
    	<div class="text-center">
    		<img src="/images/logo.png" class="img-responsive img-center">
    		<h4><b>{{$title}}</b></h4>
    	</div>
    	<div>
    		<table class="table">
            <thead>
                <tr>
                    <th><h4 class="box-title"><b>Revenue</b></h4></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Reference No</th>
                    <th>Revenue Type</th>
                    <th>Price</th>
                    <th>Exchange rate</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($revenues as $revenue)
                <tr>
                    <td>{{$revenue->created_at}}</td>
                    <td>{{$revenue->reference_no}}</td>
                    <td>{{$revenue->revenue_type->type}}</td>
                    <td>{{$revenue->currency}} {{number_format($revenue->price, 2, '.', ',')}}</td>
                    <td>{{$revenue->currency}} {{number_format($revenue->exchange_rate, 2, '.', ',')}}</td>
                    <td>USD {{number_format($revenue->total, 2, '.', ',')}}</td>
                </tr>
                @endforeach
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="alert alert-success"><b>GRAND TOTAL:</b></td>
                <td class="alert alert-success"><b>USD {{number_format($totalRevenue, 2, '.', ',')}}</b></td>
            </tr> 
		    <thead>
                <tr>
                    <th><h4 class="box-title"><b>Exepense</b></h4></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
		      	<tr>
			        <th>Date</th>
	                <th>Reference No</th>
	                <th>Expense Type</th>
	                <th>Price</th>
	                <th>Exchange rate</th>
	                <th>Total</th>
		      	</tr>
		    </thead>
		    <tbody>
		     	@foreach($expenses as $expense)
                <tr>
                    <td>{{$expense->created_at}}</td>
                    <td>{{$expense->reference_no}}</td>
                    <td>{{$expense->expenes_type->type}}</td>
                    <td>{{$expense->currency}} {{number_format($expense->price, 2, '.', ',')}}</td>
                    <td>{{$expense->currency}} {{number_format($expense->exchange_rate, 2, '.', ',')}}</td>
                    <td>USD {{number_format($expense->total, 2, '.', ',')}}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="alert alert-danger"><b>GRAND TOTAL:</b></td>
                    <td class="alert alert-danger"><b>USD {{number_format($totalExpense, 2, '.', ',')}}</b></td>
                </tr>
                <thead>
                    <tr>
                        <th>
                            <h4><b>Income</b></h4>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="alert alert-info"><b>NET INCOME:</b></td>
                <td class="alert alert-info"><b>USD {{number_format($totalRevenue-$totalExpense, 2, '.', ',')}}</b></td> 
            </tr>
		    </tbody>
		  </table>
    	</div>
    </div>    
    <script>
		window.print();
	</script>
</body>
</html>
