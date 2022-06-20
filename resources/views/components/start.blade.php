@extends('welcome')
@section('start')

<div class="container-fluid px-4">
    <div class="row"><br></div>
    <div class="row gx-5">
        <div class="col bg-opacity-25 bg-dark p-3">
            <p class="text-white text-center" style="font-size: medium">What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
        <div class="col">
            <img src="{{asset(url('images/promos.jpg'))}}" class="img-thumbnail rounded-circle" alt="" id="mainImgSpecial">
        </div>
        <div class="col bg-opacity-25 bg-dark p-3">
            <p class="text-white text-center" style="font-size: medium">What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col"></div>
        <div class="col text-white text-center p-4">
            <h1>Especiales</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row gx-5">
        <div class="col">
            <img src="{{asset(url('images/PRODUCT_EJEMPLO.jpg'))}}" class="img-thumbnail rounded-circle" alt="" id="mainImgSpecial" style="height: 350px;width: 350px">
        </div>
        <div class="col">
            <img src="{{asset(url('images/promos_2.jpg'))}}" class="img-thumbnail rounded-circle" alt="" id="mainImgSpecial"style="height: 350px;width: 350px">
        </div>
        <div class="col">
            <img src="{{asset(url('images/PROMOS_3.jpg'))}}" class="img-thumbnail rounded-circle" alt="" id="mainImgSpecial"style="height: 350px;width: 350px">
        </div>
    </div>
</div>
@endsection
