<h1 class="text-center mt-md-5" style="font-family: 'Arial Rounded MT Bold', sans-serif">
{{$mod}} Producto
</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{isset($product->name)?$product->name:old('name')}}">
</div>

<div class="form-group mt-3">
    <label for="description">Descripción</label>
    <input type="text" class="form-control" name="description" value="{{isset($product->description)?$product->description:old('description')}}">

</div>

<div class="form-group mt-3">
    <label for="price">Precio</label>
    <input type="number" class="form-control" name="price" value="{{isset($product->price)?$product->price:old('price')}}">
</div>

<div class="form-group mt-3">
    <label for="stock">Stock</label>
    <input type="number" class="form-control" name="stock" value="{{isset($product->stock)?$product->stock:old('stock')}}">
</div>

<div class="form-group mt-3">
    <label for="min_stock">Stock mínimo</label>
    <input type="number" class="form-control" name="min_stock" value="{{isset($product->min_stock)?$product->min_stock:old('min_stock')}}">
</div>

<div class="form-group mt-3">
    <label for="reference">Referencia</label>
    <input type="text" class="form-control" name="reference" value="{{isset($product->reference)?$product->reference:old('reference')}}">
</div>

<div class="form-group mt-3">
    <label for="iva">Iva</label>
    <input type="number" class="form-control" name="iva" value="{{isset($product->iva)?$product->iva:old('iva')}}">
</div>

<div class="form-group mt-3">
    <label for="image">Imagen</label>
    <br>
    @if(isset($project->image))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$project->image}}" width="100" alt="">
    @endif
    <input type="file" name="image">
</div>

<div class="mt-4 mb-5">
    <input type="submit" class="btn btn-success" value="{{$mod}} producto">
    <a class="btn btn-primary" href="{{url('product/management')}}">Regresar</a>
</div>
