<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gakpoktan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h4 class="text-center">Data Gakpoktan</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Nama Gapoktan</th>
                                <th scope="col">Nama Ketua</th>
                                <th scope="col">Pangan</th>
                                <th scope="col">Perkebunan</th>
                                <th scope="col">Holtikultura</th>
                                <th scope="col">peternakan</th>
                                <th scope="col">Perikanan</th>
                                <th scope="col">KWT</th>
                                <th scope="col">No Telp</th>
                            <tr>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($gakpoktans as $data)
                            <tr>
                                <td scope="col">{{$no++}}</td>
                                <td scope="col">{{$data->desa}}</td>
                                <td scope="col">{{$data->nama_gakpoktan}}</td>
                                <td scope="col">{{$data->nama_ketua}}</td>
                                <td scope="col">{{$data->pangan}}</td>
                                <td scope="col">{{$data->berkebunan}}</td>
                                <td scope="col">{{$data->hortikultura}}</td>
                                <td scope="col">{{$data->peternakan}}</td>
                                <td scope="col">{{$data->perikanan}}</td>
                                <td scope="col">{{$data->kwt}}</td>
                                <td scope="col">{{$data->no_telepopn}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
</body>

</html>