@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
        @include('shared.errors')
    @endif



    <script>
        function myFunction() {
            var selectedValue=document.getElementById("inputTipoSocio").value;

            if(selectedValue != "P") {
                document.getElementById("inputNrLicenca").style="display: none;"
                document.getElementById("labelInputNrLicenca").style="display: none;"
                document.getElementById("labelInputTipoLicenca").style="display: none;"
                document.getElementById("inputTipoLicenca").style="display: none;"
                document.getElementById("labelAluno").style="display: none;"
                document.getElementById("inputAluno").style="display: none;"
                document.getElementById("labelInstrutor").style="display: none;"


                document.getElementById("inputInstrutor").style="display: none;"



                document.getElementById("labelValidadeLicenca").style="display: none;"
                document.getElementById("validade_licenca").style="display: none;"
                document.getElementById("labelInputLicencaConfirmada").style="display: none;"
                document.getElementById("inputLicencaConfirmada1").style="display: none;"
                document.getElementById("inputLicencaConfirmada2").style="display: none;"
                document.getElementById("labelCopia").style="display: none;"
                document.getElementById("inputNrCertificado").style="display: none;"
                document.getElementById("labelNrCertificado").style="display: none;"

                document.getElementById("classe_certificado").style="display: none;"
                document.getElementById("labelCertificado").style="display: none;"

                document.getElementById("validade_certificado").style="display: none;"
                document.getElementById("inputValidadeCertificado").style="display: none;"


                document.getElementById("labelCertificadoConfirmado").style="display: none;"
                document.getElementById("inputCertificadoConfirmado").style="display: none;"

                document.getElementById("inputCertificadoPorConfirmar").style="display: none;"
                document.getElementById("naoConfirmado").style="display: none;"

                document.getElementById("confirmado").style="display: none;"
                document.getElementById("confirmado1").style="display: none;"
                document.getElementById("naoConfirmado1").style="display: none;"

                document.getElementById("labelCopia1").style="display: none;"
                document.getElementById("file_certificado").style="display: none;"
                document.getElementById("file_licenca").style="display: none;"



                document.getElementById("inputNrLicenca").value=null;
                document.getElementById("inputTipoLicenca").value=null;

                document.getElementById("inputAluno").value=null;


                document.getElementById("inputInstrutor").value=null;




                document.getElementById("validade_licenca").value=null;
                document.getElementById("inputLicencaConfirmada1").value=null;
                document.getElementById("inputLicencaConfirmada2").value=null;



                document.getElementById("inputNrCertificado").value=null;


                document.getElementById("classe_certificado").value=null;


                document.getElementById("validade_certificado").value=null;
                document.getElementById("inputValidadeCertificado").value=null;


                document.getElementById("inputCertificadoConfirmado").value=null;

                document.getElementById("inputCertificadoPorConfirmar").value=null;





                document.getElementById("file_certificado").value=null;
                document.getElementById("file_licenca").value=null;





            }else{
                document.getElementById("labelInputNrLicenca").style="display: ?;"
                document.getElementById("inputNrLicenca").style="display: ?;"
                document.getElementById("labelInputTipoLicenca").style="display: ?;"
                document.getElementById("inputTipoLicenca").style="display: ?;"
                document.getElementById("labelAluno").style="display: ?;"
                document.getElementById("inputAluno").style="display: ?;"
                document.getElementById("inputInstrutor").style="display: ?;"
                document.getElementById("labelInstrutor").style="display: ?;"
                document.getElementById("labelValidadeLicenca").style="display: ?;"
                document.getElementById("validade_licenca").style="display: ?;"
                document.getElementById("labelInputLicencaConfirmada").style="display: ?;"
                document.getElementById("inputLicencaConfirmada1").style="display: ?;"
                document.getElementById("inputLicencaConfirmada2").style="display: ?;"
                document.getElementById("labelCopia").style="display: ?;"

                document.getElementById("inputNrCertificado").style="display: ?;"
                document.getElementById("labelNrCertificado").style="display: ?;"

                document.getElementById("classe_certificado").style="display: ?;"
                document.getElementById("labelCertificado").style="display: ?;"

                document.getElementById("validade_certificado").style="display: ?;"
                document.getElementById("inputValidadeCertificado").style="display: ?;"

                document.getElementById("labelCertificadoConfirmado").style="display: ?;"
                document.getElementById("inputCertificadoConfirmado").style="display: ?;"

                document.getElementById("inputCertificadoPorConfirmar").style="display: ?;"
                document.getElementById("naoConfirmado").style="display: ?;"
                document.getElementById("naoConfirmado1").style="display: ?;"

                document.getElementById("confirmado").style="display: ?;"
                document.getElementById("confirmado1").style="display: ?;"

                document.getElementById("labelCopia1").style="display: ?;"

                document.getElementById("file_certificado").style="display: ?;"
                document.getElementById("file_licenca").style="display: ?;"

            }
        }
    </script>


    <form action="{{action('UserController@store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="inputNumSocio" >Numero de S??cio</label>
        <input type="text" name="num_socio" id="inputNumSocio" placeholder="N??mero de S??cio">
    </div>
    <div>
        <label for="inputNome">Nome</label>
        <input type="text" name="name" id="inputNome" placeholder="Nome">
    </div>
    <div>
        <label for="inputNomeInformal">Nome informal</label>
        <input type="text" name="nome_informal" id="inputNomeInformal" placeholder="Nome informal">
    </div>
    <div>
        <label for="inputSexo">Sexo</label>
        <select name="sexo" id="inputSexo">
            <option disabled selected> -- Selecione uma op????o -- </option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </div>

    <div>
        <label for="inputEmail">Email</label>
        <input type="email" name="email" id="inputEmail" placeholder="Email">

    </div>

    <div>
        <label for="inputNif">NIF</label>
        <input type="text" name="nif" id="inputNif" placeholder="NIF">
    </div>
    <div>
        <label for="inputDataNascimento">Data nascimento</label>
        <input type="date" name="data_nascimento" id="inputDataNascimento">
    </div>
    <div>
        <label for="inputTelefone">Telefone</label>
        <input type="text" name="telefone" id="inputTelefone" placeholder="Telefone">
    </div>
    <div>
        <label for="inputEndereco">Endere??o</label>
        <input type="text" name="endereco" id="inputEndereco" placeholder="Endere??o">
    </div>

    <div>
        <label for="inputTipoSocio">Tipo de S??cio </label>
        <select name="tipo_socio" id="inputTipoSocio" onchange="myFunction()">
            <option disabled selected> -- Selecione uma op????o -- </option>
            <option value="P">Piloto</option>
            <option value="NP">N??o Piloto</option>
            <option value="A">Aeromodelista</option>
        </select>
    </div>

    <div>
        <label for="inputQuotaPaga">Quota Paga</label>
        <input type="radio" name="quota_paga" value="1"> Sim
        <input type="radio" name="quota_paga" value="0"> N??o
        
    </div>

    <div>
        <label for="inputAtivo">Ativo</label>
        <input type="radio" name="ativo" value="1"> Sim
        <input type="radio" name="ativo" value="0"> N??o
    </div>

    <div>
        <label for="inputDirecao">Dire????o</label>
        <input type="radio" name="direcao" value="1"> Sim
        <input type="radio" name="direcao" value="0"> N??o


    </div>
    <div>
        <label for="inputAluno" id="labelAluno">Aluno</label>
        <input type="text" name="aluno" id="inputAluno" placeholder="Aluno">
    </div>

    <div>
        <label for="inputInstrutor" id="labelInstrutor">Instrutor</label>
        <input type="text" name="instrutor" id="inputInstrutor" placeholder="Instrutor">
    </div>

    <div>
        <label for="inputNrLicenca" id="labelInputNrLicenca">Numero da licen??a</label>
        <input type="text" name="num_licenca" id="inputNrLicenca" placeholder="N??mero da licen??a">
    </div>

    <div>
        <label id="labelInputTipoLicenca" for="inputTipoLicenca">Tipo de licen??a</label>
       {{--<input type="text" name="tipo_licenca" id="inputTipoLicenca" placeholder="Tipo da licen??a">--}}
         <select name="tipo_licenca" id="inputTipoLicenca">
            @foreach($licencas as $licenca)
                 <option id="inputTipoLicenca" value="{{$licenca->code}}">{{$licenca->nome}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="inputValidadeLicenca" id="labelValidadeLicenca" >Validade da licen??a</label>
        <input type="date" name="validade_licenca" id="validade_licenca">
    </div>

    <div>
        <label id="labelInputLicencaConfirmada" for="inputLicencaConfirmada">Licen??a confirmada</label>
        <input id="inputLicencaConfirmada1" type="radio" name="licenca_confirmada" value="1"> <label id="confirmado1" > Sim </label>
        <input id="inputLicencaConfirmada2" type="radio" name="licenca_confirmada" value="0"> <label id="naoConfirmado1" >N??o</label>

    </div>

    <div>
        <label for="inputNrCertificado" id="labelNrCertificado">N??mero do certificado</label>
        <input type="text" name="num_certificado" id="inputNrCertificado" placeholder="N??mero do certificado">

    </div>

    <div>
        <label for="inputClasseCertificado" id="labelCertificado">Classe do certificado </label>
      {{--  <input type="text" name="classe_certificado" id="inputClasseCertificado" placeholder="Classe do Certificado">--}}


        <select name="classe_certificado" id="classe_certificado">
            @foreach($classes as $classe)
                <option id="inputClasseCertificado" value="{{$classe->code}}">{{$classe->nome}}</option>
            @endforeach
        </select>


    </div>

    <div>
        <label for="inputValidadeCertificado" id="validade_certificado">Validade do certificado</label>
        <input type="date" name="validade_certificado" id="inputValidadeCertificado">

    </div>

    <div>
        <label for="inputCertificadoConfirmado" id="labelCertificadoConfirmado">Certificado confirmado</label>
        <input type="radio" id="inputCertificadoConfirmado" name="certificado_confirmado" value="1"> <label
                id="confirmado">Sim</label>
        <input type="radio" id="inputCertificadoPorConfirmar" name="certificado_confirmado" value="0"> <label id="naoConfirmado">N??o</label>

    </div>




    <div><label for="image">Foto</label>

        <input type="file" name="file_foto">
    </div>

    <div>
        <label for="inputFileLicenca" id="labelCopia">C??pia digital da licen??a</label>
        <input type="file" name="file_licenca" id="file_licenca">
    </div>

    <div>
        <label for="inputFileCertificado" id="labelCopia1" >C??pia digital do certificado</label>
        <input type="file" name="file_certificado" id="file_certificado">
    </div>

    <div>
        <button type="submit" class="btn btn-primary" name="ok">Save</button>
        <button type="button" class="btn btn-primary" onclick="window.history.back();">Cancel</button>
    </div>

</form>

@endsection
