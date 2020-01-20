@extends('layouts.header')

@section('title')
boco | Admin Panel
@endsection

@section('content')

<div class="container">
	<h1>Editer un produit</h1>
	<form method="POST" action="{{ route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Titre" value="{{$product->title}}">
		</div>

		<div class="form-group">
			<label for="sku">SKU: </label>
			<input type="text" name="sku" class="form-control" id="sku" placeholder="sku" value="{{$product->sku}}">
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
			<input type="text" name="price" class="form-control" id="price" placeholder="Prix" value="{{$product->price}}">
		</div>

		<div class="form-group">
			<label for="description">Description: </label>
			<textarea name="description" class="form-control" cols="7" rows="7">{{$product->description}}</textarea>
		</div>
		<div class="form-group">
       <label class="col-md-4 text-right">Select Profile Image</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="100" />
               <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
       </div>
      </div>

		<div><br>
			<button class="btn btn-primary" type="submit">Ajouter un produit</button>
		</div>
	</form>

	<form method="POST" action="{{ route('admin.products.destroy', $product->id)}}" enctype="multipart/form-data">
		@csrf
		@method('DELETE')
		
		<div><br>
			<button class="btn btn-primary" type="submit">Ajouter un produit</button>
		</div>
	</form>
 <div>
@endsection