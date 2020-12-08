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
        <b>Divisão de Cursos</b>
    </div>
    <br><br>
    <table width="100%" style="border-collapse: collapse; border: 1px solid">
        @foreach ($curso as $curso)
            <tr style="background-color: #ADB5BD; border: 1px solid">
                <td style="border: 1px solid;" align="center" colspan="2">
                    <b>ITINERÁRIO FORMATIVO <BR>
                    {{ $curso->nome." | ".$curso->carga_horaria }}h</b>
                </td>
            </tr>
            @foreach ($modulos as $modulo)
                <tr style="background-color: #DEE2E6">
                    <td align="center" colspan="2" style="border: 1px solid; border-bottom: 1px solid">
                        <b>{{ $modulo->nome." | ".$modulo->carga_horaria }}h</b>
                    </td>
                </tr>
                    @foreach ($disciplinas as $disciplina)
                        @if ($curso->id == $disciplina->curso_id && $modulo->id == $disciplina->modulo_id)
                            <tr style="background-color: #F8F9FA">
                                @if ($disciplina->nome)
                                    <td style="padding-left: 10px">
                                        {{ $disciplina->nome }}
                                    </td>
                                    <td style="padding-left: 10px; padding-right: 10px" align="right">
                                        {{ $disciplina->carga_horaria }}h
                                    </td>
                                @else
                                    <td colspan="2"></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
            @endforeach
        @endforeach
    </table>
</body>
</html>
