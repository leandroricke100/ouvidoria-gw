<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <script src="{{ asset('js/ouvidoria.js') }}"></script>
    <link href="{{ asset('css/ouvidoria.css') }}" rel="stylesheet">


    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}

</head>

<body>

    <div class="home">
        <span><strong>&#8226; Denúncia:</strong></span>
        <p>Comunicação de prática de irregularidade ou ato ilícito cuja solução dependa da atuação dos órgãos
            apuratórios
            competentes. A denúncia envolve infrações disciplinares, crimes, prática de atos de corrupção, má utilização
            de
            recursos públicos ou improbidade administrativa que venham ferir a ética e a legislação, bem como as
            violações
            de direitos, mesmo que ocorridas em âmbito privado.</p>

        <span><strong>&#8226; Reclamação:</strong></span>
        <p>Demonstração de insatisfação relativa a prestação de serviço público, como a falta de respeito durante um
            atendimento. Nesta categoria se enquadram também as críticas e as opiniões desfavoráveis.</p>
        <span><strong>&#8226; Solicitação:</strong></span>
        <p>A solicitação refere-se a um requerimento de atendimento ou serviço. Pode ser utilizada inclusive para
            comunicar problemas, como no caso em que o usuário comunica a falta de um medicamento e requer a solução do
            problema.</p>
        <span><strong>&#8226; Solicitação:</strong></span>
        <p>Apresentação de ideia ou formulação de proposta de aprimoramento de políticas e serviços prestados pela
            Administração Pública.
        </p>
        <span><strong>&#8226; Elogio:</strong></span>
        <p>Demonstração de reconhecimento ou satisfação sobre o serviço oferecido ou atendimento recebido.</p>
        <p>OBS : Comunicação de irregularidade, informações de origem anônima, sem identificação do manifestante, que
            comunicam irregularidades com indícios mínimos de relevância, autoria e materialidade. As comunicações de
            irregularidade devem ser enviadas ao órgão ou entidade competente para apuração. Por não serem
            identificadas, não são passíveis de acompanhamento pelo usuário.</p>
    </div>

    <div class="home container">
        <div id="email-formulario">
            <div class="title-email">Informe seu e-mail para cadastrar uma solicitação</div>

            <div class="container-itens">
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="teste@teste.com" required />
                <button onclick="openModal()">PRÓXIMO</button>
            </div>
        </div>

        <div id="email-formulario">
            <div class="title-email">Dados estatísticos</div>
            <div class="container-itens">
                <p>Veja dados estatísticos das solicitações realizadas</p>
                <button>Ver dados estatísticos</button>
            </div>
        </div>
    </div>




    <div id="modal" class="modal">
        <button onclick="closeModal()">Voltar</button>
        <h1>Novo usuário</h1>
        <p>Preencha os campos abaixo para realizar seu cadastro.
        </p>
        <p>Eles são importantes para que você possa realizar e acompanhar solicitações junto à Ouvidoria da câmara.

        <p>(*) Campos de preenchimento obrigatório.</p>

        </p>
        <form>
            <h3>Tipo de Cadastro (*)</h3>


            <input type="radio" id="pessoaFisica" name="tipoCadastro" value="pessoaFisica" checked required><label
                for="pessoaFisica">Pessoa
                Física</label>
            <input type="radio" id="pessoaJuridica" name="tipoCadastro" value="pessoaJuridica" required><label
                for="pessoaJuridica">Pessoa
                Jurídica</label>

            <h3>Dados do Usuário
            </h3>


            <div class="pf">
                <label for="nomeCompleto">Nome completo (*)</label>
                <input type="text" id="nomeCompleto" name="nomeCompleto" placeholder="Digite seu nome completo..."
                    required>
            </div>

            <div class="pj">
                <label for="razaoSocial">Razão Social (*)</label>
                <input type="text" id="razaoSocial" name="razaoSocial"
                    placeholder="Digite a razão social da sua empresa..." required>
            </div>



            <div class="pf">
                <label for="cpf">CPF (*)</label>
                <input type="number" id="cpf" name="cpf" placeholder="Digite seu CPF..." required>
            </div>

            <div class="pj">
                <label for="cnpj">CNPJ (*)</label>
                <input type="number" id="cnpj" name="cnpj" placeholder="Digite seu CNPJ..." required>
            </div>




            <label for="email">E-mail (*)</label>
            <input type="text" id="email" name="email" placeholder="Digite seu e-email..." required>

            <label for="telefone">Telefone (*)</label>
            <input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone..." required>

            <label for="celular">Celular (*)</label>
            <input type="tel" id="celular" name="celular" placeholder="Digite seu telefone..." required>

            <h3>Dados Pessoais
            </h3>



            <div class="pj">
                <label for="nomeResponsavel">Nome do responsável (*)</label>
                <input type="text" id="nomeResponsavel" name="nomeResponsavel"
                    placeholder="Digite o nome do responsáavel...">
            </div>




            <label for="dataNascimento">Data de Nascimento (*)</label>
            <input type="date" id="dataNascimento" name="dataNascimento"
                placeholder="Digite a data de nascimento...">

            <label for="nacionalidade">Nacionalidade (*)</label>
            <input type="text" id="nacionalidade" name="nacionalidade" placeholder="Digite sua nacionalidade..."
                required>

            <label for="naturalidade">Naturalidade (*)</label>
            <input type="text" id="naturalidade" name="naturalidade" placeholder="Digite sua nacionalidade..."
                required>

            <label for="estadoCivil">Estado Civil (*)</label>
            <select id="estadoCivil" name="estadoCivil" required>
                <option value="" disabled selected>Selecione seu estado civil...</option>
                <option value="solteiro">Solteiro(a)</option>
                <option value="casado">Casado</option>
                <option value="separado">Separado(a)</option>
                <option value="divorciado">Divorciado(a)</option>
                <option value="viuvo">Viuvo(a)</option>
            </select>

            <label for="sexo">Sexo (*)</label>
            <select id="sexo" name="sexo" required>
                <option value="" disabled selected>Selecione seu sexo...</option>
                <option value="solteiro">Masculino</option>
                <option value="casado">Feminino</option>
            </select>

            <h3>Endereço</h3>
            <label for="endereco">Endereço completo(*)</label>
            <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço..." required>

            <h3>Acesso à Ouvidoria
            </h3>
            <label for="senha">Senha (*)</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha..." required>

            <h3>Solicitaçção</h3>
            <input type="radio" id="semSigilo" name="solicitacao" value="semSigilo" checked required><label
                for="semSigilo">Sem sigilo</label>

            <input type="radio" id="sigilo" name="solicitacao" value="sigilo" required><label
                for="sigilo">Sigilo</label>

            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected>Selecione</option>
                <option value="denuncia">Denúncia</option>
                <option value="elogio">Elogio</option>
                <option value="reclamacao">Reclamação</option>
                <option value="sugestao">Sugestão</option>
                <option value="simplificada">Simplificada</option>
            </select>

            <label for="prioridade">Prioridade</label>
            <select id="prioridade" name="prioridade" required>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
                <option value="urgente">Urgente</option>
            </select>

            <label for="assunto">Assunto</label>
            <input type="text" id="assunto" name="assunto">

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" rows="4" cols="50">
            </textarea>

            <label for="arquivo">Arquivo</label>
            <input type="file" id="arquivo" name="arquivo">

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>
