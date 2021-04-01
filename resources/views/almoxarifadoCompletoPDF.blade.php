<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div align="center">
        <img src="{{public_path('backend/images/acre.png')}}" alt="Logo" height="75px">
    </div>
    <div align="center" style="padding-top: 5px">
        <b>Escola de Gastronomia e Hospitalidade</b>
        <br>
        <b>Divisão de Almoxarifado</b>
    </div>
    <br><br>
    <table width="100%" style="border: 1px solid">
        <tr align="center">
            <td colspan="2"><b>RELATÓRIO DE RETIRADA</b></td>
        </tr>
    </table>
    <br>
    <table class="table" style="width: 100%; border: 1px solid; border-collapse: collapse">
        <thead>
            <tr>
                <th style="border: 1px solid; width: 10%" align="center">#</th>
                <th style="border: 1px solid" align="left">Item</th>
                <th style="border: 1px solid; width: 10%" align="center">Unidade</th>
                <th style="border: 1px solid; width: 15%" align="center">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach($data as $item)
            <tr>
                <td align="center">{{ $count }}</td>
                <td align="left">{{ $item->descricao }}</td>
                <td align="center">{{ $item->unidade }}</td>
                <td align="center">{{ $item->quantidade }}</td>
            </tr>
            {{ $count++ }}
            @endforeach
        </tbody>
    </table>
    <br><br><br>
    <table width="100%">
        <tr>
            <td style="width: 50%">___________________________________________</td>
            <td style="width: 50%">___________________________________________</td>
        </tr>
        <tr>
            <td style="width: 50%" align="center"><b>Assinatura do Responsável</b></td>
            <td style="width: 50%" align="center"><b>{{ $item->solicitante }}</b></td>
        </tr>
        <tr>
            <td style="width: 50%" align="center"></td>
            <td style="width: 50%; font-size: 14px" align="center">Solicitante</td>
        </tr>
    </table>
</body>
</html>
