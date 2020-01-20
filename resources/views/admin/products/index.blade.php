@extends('layouts.header')

@section('title')
boco | Admin Panel
@endsection

@section('content')
<div class="container">
	<table class="table table-condensed">
		<thead>
			<h2 style="text-align: right;margin-top: 20px;margin-bottom: 20px;"><a href="{{ route('admin.products.create')}}" class="btn btn-primary"> Ajouter un produit</a></h2>
			<tr>
				<td>ID</td>
				
				<td>Image</td>
				<td>Title</td>
				<td>Description</td>
				<td>Price</td>
				<td>Edit</td>
				<td>Supprimer</td>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->id}}</td>
				<td><img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="75" /></td>
				<td>{{ $product->title}}</td>
				<td>{{ $product->description }}</td>
				<td> {{ $product->price}} €</td>
				<td><a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-secondary">Editer</a></td>
				<td><form method="POST" action="{{ route('admin.products.destroy', $product->id)}}" enctype="multipart/form-data">
					@csrf
					@method('DELETE')
					
					<div>
						<button class="btn btn-danger" type="submit">Supprimer</button>
					</div>
				</form></td>

			</tr>	

			@endforeach
		</tbody>
		
	</table>
	
</div>

@endsection