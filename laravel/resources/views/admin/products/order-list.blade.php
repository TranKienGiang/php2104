<x-admin>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">List Order</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="card-body table-responsive p-0" style="height: 300px;">
					<table class="table table-head-fixed text-nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Total Price</th>
								<th>Code</th>
								<th>Note</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->name}}</td>
								<td>{{$order->phone}}</td>
								<td>{{$order->email}}</td>
								<td>{{$order->address}}</td>
								<td>{{$order->total_price}}</td>
								<td>{{$order->code}}</td>
								<td>{{$order->note}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<a href="{{route('order.export')}}" style="width: 10%;margin-left: 90%;" type="button" class="btn btn-block btn-outline-success">Xuất Excell</a>
</x-admin>