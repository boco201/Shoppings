@extends('layouts.header')

@section('title')
boco | Admin Panel
@endsection

@section('content')

<div class="container">
	<h1>Ajouter un produit</h1>
	<form method="POST" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Titre">
		</div>

		<div class="form-group">
			<label for="sku">SKU: </label>
			<input type="text" name="sku" class="form-control" id="sku" placeholder="sku">
		</div>

		 <div class="form-group">
                <label for="identite_id">Category* : </label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
           </div>


		<div class="form-group">
			<label for="price">Prix: </label>
			<input type="text" name="price" class="form-control" id="price" placeholder="Prix">
		</div>

		<div class="form-group">
			<label for="description">Description: </label>
			<textarea name="description" class="form-control" cols="7" rows="7"></textarea>
		</div>
		<div>
			<label for="image">Upload Image: </label><br>
			<input type="file" name="image">
		</div>

		<div><br>
			<button class="btn btn-primary" type="submit">Ajouter un produit</button>
		</div>
	</form>
 <div>
@endsection