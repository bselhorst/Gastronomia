@extends('layouts/layout')

@section('page-title')
<span class="font-weight-semibold">Alunos</span> - {{ @$data ? 'Editar' : 'Cadastrar' }}
@endsection

@section('page-title-buttons')
@endsection

@section('breadcrumb')
<a href="../tecnologia" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="{{ route('alunos.index') }}" class="breadcrumb-item"><i class="icon-users mr-2"></i> Alunos</a>
<span class="breadcrumb-item active">{{ @$data ? 'Editar' : 'Cadastrar' }}</span>
@endsection

@section('content')
<script src="{{ asset('backend/assets/js/jquery.mask.js') }}" type="text/javascript"></script>

<!-- Form validation -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{{ @$data ? 'Editar Cadastro' : 'Cadastrar Pessoa' }}</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form class="form-validate-jquery" method="POST" action="{{ @$data ? route('alunos.update', $data->id) : route('alunos.store') }}">
            @csrf
            @if (@$data)
                @method('PATCH')
            @endif
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Dados Gerais</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Nome Completo<span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="nome" class="form-control" required placeholder="Nome Completo (Sem abreviações)" value="{{ @$data->nome }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Filiação 1</label>
                    <div class="col-lg-4">
                        <input type="text" name="filiacao1" class="form-control" placeholder="Filiação" autocomplete="off" value="{{ @$data->filiacao1 }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Filiação 2</label>
                    <div class="col-lg-4">
                        <input type="text" name="filiacao2" class="form-control" placeholder="Filiação" autocomplete="off" value="{{ @$data->filiacao2 }}">
                    </div>
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">Documentos</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">RG <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="rg" class="form-control" placeholder="" autocomplete="off" value="{{ @$data->rg }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Órgão Exp. <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="orgaoExp" class="form-control" placeholder="" autocomplete="off" value="{{ @$data->orgaoExp }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">CPF <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="cpf" class="form-control" data-mask="000.000.000-00" placeholder="___.___.___-__" autocomplete="off" value="{{ @$data->cpf }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Sexo <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select class="form-control select-search select2-hidden-accessible" name="sexo" id="sexo" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Masculino" {{ @$data->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Feminino" {{ @$data->sexo == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="Ignorar" {{ @$data->sexo == 'Ignorado' ? 'selected' : '' }}>Ignorar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Data de Nascimento <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="date" name="dataNascimento" class="form-control" value="{{ @$data->dataNascimento }}" autocomplete="off">
                    </div>
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">Endereço</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Rua <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="rua" class="form-control" placeholder="Rua" value="{{ @$data->rua }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Número <span class="text-danger">*</span></label>
                    <div class="col-lg-1">
                        <input type="text" name="numero" class="form-control" data-mask="00000" placeholder="" value="{{ @$data->numero }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Bairro <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ @$data->bairro }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Municipio <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="municipio" class="form-control" placeholder="Municipio" value="{{ @$data->municipio }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Complemento <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="complemento" class="form-control" placeholder="Complemento" value="{{ @$data->complemento }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Cep <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="cep" class="form-control" data-mask="00000-000" placeholder="_____-___" value="{{ @$data->cep }}" autocomplete="off">
                    </div>
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">Dados de Contato</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Telefone <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="telefone" class="form-control" data-mask="(00)000000000" placeholder="(__)_________" value="{{ @$data->telefone }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Celular <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="celular" class="form-control" data-mask="(00)000000000" placeholder="(__)_________" value="{{ @$data->celular }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ @$data->email }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Nome do contato de emergência <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="nomeDeEmergencia" class="form-control" placeholder="Nome" value="{{ @$data->nomeDeEmergencia }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Contato de Emergência <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="numeroEmergencia" class="form-control" data-mask="(00)000000000" data-mask-clearifnotmatch="true" value="{{ @$data->numeroEmergencia }}" placeholder="(__)_________" autocomplete="off">
                    </div>
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">Sócio Econômico</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Trabalha? <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <select class="form-control select-search select2-hidden-accessible" name="trabalha" id="trabalha" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Sim" {{ @$data->trabalha == 'Sim' ? 'selected' : '' }}>Sim</option>
                            <option value="Não" {{ @$data->trabalha == 'Não' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Local do trabalho <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="localTrabalho" class="form-control" placeholder="Local" value="{{ @$data->localTrabalho }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Telefone do trabalho<span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <input type="text" name="telefoneTrabalho" class="form-control" data-mask="(00)000000000" placeholder="(__)_________" value="{{ @$data->telefoneTrabalho }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Ocupacao <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="ocupacaoTrabalho" class="form-control" placeholder="Ocupacao" value="{{ @$data->ocupacaoTrabalho }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Tempo de trabalho <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="tempoTrabalho" class="form-control" placeholder="Tempo" value="{{ @$data->tempoTrabalho }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Possui carteira de trabalho? <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <select class="form-control select-search select2-hidden-accessible" name="possuiCarteiraDeTrabalho" id="possuiCarteiraDeTrabalho" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Sim" {{ @$data->possuiCarteiraDeTrabalho == 'Sim' ? 'selected' : '' }}>Sim</option>
                            <option value="Não" {{ @$data->possuiCarteiraDeTrabalho == 'Não' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Possui cadastro no Cine? <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <select class="form-control select-search select2-hidden-accessible" name="cadastroCine" id="cadastroCine" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Sim" {{ @$data->cadastroCine == 'Sim' ? 'selected' : '' }}>Sim</option>
                            <option value="Não" {{ @$data->cadastroCine == 'Não' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Renda Familiar <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select class="form-control select-search select2-hidden-accessible" name="rendaFamiliar" id="rendaFamiliar" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Menos de 1 salário" {{ @$data->rendaFamiliar == 'Menos de 1 salário' ? 'selected' : '' }}>Menos de 1 salário</option>
                            <option value="Entre 1 e 2 salários" {{ @$data->rendaFamiliar == 'Entre 1 e 2 salários' ? 'selected' : '' }}>Entre 1 e 2 salários</option>
                            <option value="Entre 2 e 3 salários" {{ @$data->rendaFamiliar == 'Entre 2 e 3 salários' ? 'selected' : '' }}>Entre 2 e 3 salários</option>
                            <option value="Entre 3 e 4 salários" {{ @$data->rendaFamiliar == 'Entre 3 e 4 salários' ? 'selected' : '' }}>Entre 3 e 4 salários</option>
                            <option value="Mais de 4 salários mínimos" {{ @$data->rendaFamiliar == 'Mais de 4 salários mínimos' ? 'selected' : '' }}>Mais de 4 salários mínimos</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Estuda? <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <select class="form-control select-search select2-hidden-accessible" name="estuda" id="estuda" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Sim" {{ @$data->estuda == 'Sim' ? 'selected' : '' }}>Sim</option>
                            <option value="Não" {{ @$data->estuda == 'Não' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Escolaridade <span class="text-danger">*</span></label>
                    <div class="col-lg-2">
                        <select class="form-control select-search select2-hidden-accessible" name="escolaridade" id="escolaridade" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Sim" {{ @$data->escolaridade == 'Sim' ? 'selected' : '' }}>Sim</option>
                            <option value="Não" {{ @$data->escolaridade == 'Não' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">NIS <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="nis" class="form-control" placeholder="Tempo" value="{{ @$data->nis }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2" style="margin-top: -10px">Recebe algum auxílio financeiro por meio de algum programa do governo? <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select class="form-control select-search select2-hidden-accessible" name="auxilioFinanceiro" id="auxilioFinanceiro" tabindex="-1" aria-hidden="true" required>
                            <option value="">Selecione um valor</option>
                            <option value="Bolsa Família" {{ @$data->auxilioFinanceiro == 'Bolsa Família' ? 'selected' : '' }}>Bolsa Família</option>
                            <option value="Benefício de prestação continuada - BPC" {{ @$data->auxilioFinanceiro == 'Benefício de prestação continuada - BPC' ? 'selected' : '' }}>Benefício de prestação continuada - BPC</option>
                            <option value="Outros" {{ @$data->auxilioFinanceiro == 'Outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="d-flex justify-content-end align-items-center">
                <button type="reset" class="btn btn-light" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>
                <button type="submit" class="btn btn-primary ml-3">{{ @$data ? 'Editar' : 'Cadastrar' }} <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>

<!-- /form validation -->
@endsection
