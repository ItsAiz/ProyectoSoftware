<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Descarga</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        @page {
            margin-left: 2.5rem;
            margin-right: 4.5rem;
        }
    </style>

</head>

<body>

<div class="container-fluid">

    <div class="container-fluid">
        <h4 style="font-weight: bolder;">LISTADO DOMICILIOS</h4>
        <br>
    </div>

    <div class="container-fluid">

        <table class="table table-striped mb-0"
               style="width: 100%; border-style: solid; border-width: 2px; border-color: black">

            <thead>

            <tr class="text-center">
                <th scope="col">Fecha domicilio</th>
                <th scope="col">Nombre cliente</th>
                <th scope="col">Dirección cliente</th>
                <th scope="col">Teléfono cliente</th>
                <th scope="col">Total</th>
            </tr>

            </thead>

            <tbody class="text-center">

            @foreach($orders as $order)
                <tr>
                    <td> {{$order->saleDate}} </td>
                    <td> {{$order->name}} </td>
                    <td> {{$order->address}} </td>
                    <td> {{$order->phoneNumber}} </td>
                    <td> {{$order->totalCost}} </td>
                </tr>
            @endforeach

            </tbody>

        </table>

        <hr class="bg-dark">

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>

</body>

</html>
