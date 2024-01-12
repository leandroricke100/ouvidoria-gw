<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <script src="{{ asset('js/ouvidoria.js') }}?v={{ time() }}"></script>
    <link href="{{ asset('css/ouvidoria.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

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
                <div class="container-icons">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="emailCadastro" placeholder="teste@teste.com" required />
                </div>
                <button onclick="openModal()">CADASTRAR <i class="fas fa-arrow-right"
                        style="margin-left: 7px"></i></button>
            </div>
        </div>

        <div id="email-formulario">
            <div class="title-email"><i class="fas fa-sign-in" style="margin-right: 10px"></i>Login</div>
            <div class="container-itens">
                <label for="email">E-mail</label>
                <div class="container-icons">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="emailLogin" placeholder="teste@teste.com" required />
                </div>

                <label for="senha">Senha</label>
                <div class="container-icons">
                    <i class="fas fa-lock-alt"></i>
                    <input type="password" id="password" placeholder="*******" required />
                </div>
                <button onclick="login()">ACESSAR <i class="fas fa-arrow-right" style="margin-left: 7px"></i></button>
            </div>
        </div>
    </div>




    <div id="modal" class="modal">
        <div class="top">
            <div class="voltar-top">
                <button class="button-voltar" onclick="closeModal()">Voltar</button>
            </div>
            <div class="title-center">
                <h1>Nova Solicitação</h1>
            </div>
        </div>

        <section>



            <p>Preencha os campos abaixo para realizar seu cadastro.<br>
                Eles são importantes para que você possa realizar e acompanhar solicitações junto à Ouvidoria da câmara.
            </p>


            <p class="campo-obrigatorio"><span class="campo-obrigatorio">*</span> Campos de preenchimento obrigatório.
            </p>

            </p>
            <form class="form" id="cad-atendimento">
                <h3>Tipo de Cadastro <span class="campo-obrigatorio"><span class="campo-obrigatorio">*</span></span>
                </h3>

                <div class="radio">
                    <input type="radio" id="pessoaFisica" name="tipoCadastro" value="pessoaFisica" checked required>
                    <label for="pessoaFisica">Pessoa Física</label>
                </div>

                <div class="radio">
                    <input type="radio" id="pessoaJuridica" name="tipoCadastro" value="pessoaJuridica" required>
                    <label for="pessoaJuridica">Pessoa Jurídica<label>
                </div>

                <div class="sigilo">
                    <input type="radio" id="semSigilo" name="sigiloso" value="0" checked required>
                    <label for="semSigilo" style="margin-bottom: -4px;">
                        Sem sigilo
                    </label>

                    <input style="margin-left: 15px" type="radio" id="sigilo" name="sigiloso" value="1"
                        required>
                    <label for="sigilo" style="margin-bottom: -4px;">Sigiloso</label>
                </div>



                <div class="cadastro">
                    <div class="field pf">
                        <label for="nomeCompleto">Nome completo <span class="campo-obrigatorio"><span
                                    class="campo-obrigatorio">*</span></span></label>
                        <input type="text" id="nomeCompleto" name="nomeCompleto"
                            placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="field pj">
                        <label for="razaoSocial">Razão Social <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="razaoSocial" name="razaoSocial"
                            placeholder="Digite a razão social da sua empresa" required>
                    </div>

                    <div class="field pf">
                        <label for="cpf">CPF <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                    </div>

                    <div class="field pj">
                        <label for="cnpj">CNPJ <span class="campo-obrigatorio">*</span></label>
                        <input type="number" id="cnpj" name="cnpj" placeholder="Digite seu CNPJ" required>
                    </div>

                    <div class="field">
                        <label for="email">E-mail <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="email" name="email" placeholder="Digite seu e-email"
                            required>
                    </div>

                    <div class="field">
                        <label for="telefone">Telefone </label>
                        <input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone">
                    </div>

                    <div class="field">
                        <label for="celular">Celular <span class="campo-obrigatorio">*</span></label>
                        <input type="tel" id="celular" name="celular" placeholder="Digite seu celular"
                            required>
                    </div>


                    <div class="pj">
                        <div class="field">
                            <label for="nomeResponsavel">Nome do responsável <span
                                    class="campo-obrigatorio">*</span></label>
                            <input type="text" id="nomeResponsavel" name="nomeResponsavel"
                                placeholder="Digite o nome do responsáavel" required>
                        </div>
                    </div>



                    <div class="field">
                        <label for="dataNascimento">Data de Nascimento <span
                                class="campo-obrigatorio">*</span></label>
                        <input type="date" id="dataNascimento" name="dataNascimento"
                            placeholder="Digite a data de nascimento">
                    </div>

                    <div class="field">
                        <label for="nacionalidade">Nacionalidade <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="nacionalidade" name="nacionalidade"
                            placeholder="Digite sua nacionalidade" required>
                    </div>


                    <div class="field">
                        <label for="estadoCivil">Estado Civil <span class="campo-obrigatorio">*</span></label>
                        <select id="estadoCivil" name="estadoCivil" required>
                            <option value="" disabled selected>Selecione seu estado civil</option>
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado</option>
                            <option value="separado">Separado(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                            <option value="viuvo">Viuvo(a)</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="sexo">Sexo <span class="campo-obrigatorio">*</span></label>
                        <select id="sexo" name="sexo" required>
                            <option value="" disabled selected>Selecione seu sexo</option>
                            <option value="solteiro">Masculino</option>
                            <option value="casado">Feminino</option>
                        </select>
                    </div>
                </div>

                <h3 class="endereco">Endereço</h3>

                <div class="cadastro">
                    <div class="field" style="flex-basis: 200px;">
                        <label for="endereco">Endereço completo (com número)<span
                                class="campo-obrigatorio">*</span></label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço"
                            required>
                    </div>

                    <div class="field">
                        <label for="cep">CEP <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="cep" name="cep" placeholder="CEP" required>
                    </div>

                    <div class="field">
                        <label for="complemento">Complemento </label>
                        <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                    </div>

                    <div class="field">
                        <label for="bairro">Bairro <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                    </div>

                    <div class="field">
                        <label for="cidade">Cidade <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                    </div>

                </div>

                <h3>Acesso à Ouvidoria
                </h3>
                <div class="cadastro">
                    <div class="field senha">
                        <div class="field">
                            <label for="senha">Senha <span class="campo-obrigatorio">*</span></label>
                            <input type="password" id="senha" name="senha" placeholder="Digite sua senha"
                                required>
                            <p style="display: none" class="msg-senha">Senhas não conferem</p>
                        </div>

                        <div class="field">
                            <label for="confirmarSenha">Confirmar Senha <span
                                    class="campo-obrigatorio">*</span></label>
                            <input type="password" id="confirmarSenha" name="confirmarSenha"
                                placeholder="Digite sua senha" required>
                            <p style="display: none" class="msg-senha">Senhas não conferem</p>
                        </div>
                    </div>



                    <div class="field">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="denuncia">Denúncia</option>
                            <option value="elogio">Elogio</option>
                            <option value="reclamacao">Reclamação</option>
                            <option value="sugestao">Sugestão</option>
                            <option value="simplificada">Simplificada</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="prioridade">Prioridade</label>
                        <select id="prioridade" name="prioridade" required>
                            <option value="baixa">Baixa</option>
                            <option value="media">Média</option>
                            <option value="alta">Alta</option>
                            <option value="urgente">Urgente</option>
                        </select>
                    </div>


                </div>
                <div class="cadastro">
                    <div class="field">
                        <label for="assunto">Assunto <span class="campo-obrigatorio">*</span></label>
                        <input type="text" id="assunto" name="assunto"
                            placeholder="Digite aqui o assunto de sua solicitação" required>
                    </div>
                </div>
                <div class="cadastro">
                    <label for="mensagem">Mensagem <span class="campo-obrigatorio">*</span></label>
                    <textarea id="mensagem" name="mensagem" rows="8" cols="50" class="text-area"
                        placeholder="Digite aqui sua mensagem" required></textarea>

                </div>

                <div class="">
                    <div class="cad">
                        <div class="arquivo">
                            <label for="arquivo">Arquivo</label>
                            <input type="file" id="arquivo" name="arquivo">
                        </div>

                        <div class="button-cad">
                            <button class="button-voltar" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>

</html>
