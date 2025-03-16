<?php

return [
    'location' => [
        'no_location_found' => 'Não foi possível encontrar um registro correspondente ao código curto fornecido.',
        'ask_short' => 'Código Curto da Localização',
        'ask_long' => 'Descrição da Localização',
        'created' => 'Localização criada com sucesso (:name) com o ID :id.',
        'deleted' => 'Localização solicitada excluída com sucesso.',
    ],
    'user' => [
        'search_users' => 'Digite um nome de usuário, ID de usuário ou endereço de e-mail',
        'select_search_user' => 'ID do usuário a ser excluído (Digite \'0\' para pesquisar novamente)',
        'deleted' => 'Usuário excluído com sucesso do Painel.',
        'confirm_delete' => 'Tem certeza de que deseja excluir este usuário do Painel?',
        'no_users_found' => 'Nenhum usuário foi encontrado para o termo de pesquisa fornecido.',
        'multiple_found' => 'Várias contas foram encontradas para o usuário fornecido. Não foi possível excluir o usuário devido ao uso da flag --no-interaction.',
        'ask_admin' => 'Este usuário é um administrador?',
        'ask_email' => 'Endereço de E-mail',
        'ask_username' => 'Nome de Usuário',
        'ask_name_first' => 'Primeiro Nome',
        'ask_name_last' => 'Sobrenome',
        'ask_password' => 'Senha',
        'ask_password_tip' => 'Se deseja criar uma conta com uma senha aleatória enviada por e-mail ao usuário, execute novamente este comando (CTRL+C) e passe a flag `--no-password`.',
        'ask_password_help' => 'As senhas devem ter pelo menos 8 caracteres e conter pelo menos uma letra maiúscula e um número.',
        '2fa_help_text' => [
            'Este comando desativará a autenticação de dois fatores (2FA) para a conta do usuário, se estiver habilitada. Isso deve ser usado apenas como um comando de recuperação de conta se o usuário estiver bloqueado em sua conta.',
            'Se não era isso que você queria fazer, pressione CTRL+C para sair deste processo.',
        ],
        '2fa_disabled' => 'A autenticação de dois fatores foi desativada para :email.',
    ],
    'schedule' => [
        'output_line' => 'Despachando tarefa para o primeiro job em `:schedule` (:hash).',
    ],
    'maintenance' => [
        'deleting_service_backup' => 'Excluindo arquivo de backup do serviço :file.',
    ],
    'server' => [
        'rebuild_failed' => 'A solicitação de reconstrução para ":name" (#:id) no node ":node" falhou com o erro: :message',
        'reinstall' => [
            'failed' => 'A solicitação de reinstalação para ":name" (#:id) no node ":node" falhou com o erro: :message',
            'confirm' => 'Você está prestes a reinstalar um grupo de servidores. Deseja continuar?',
        ],
        'power' => [
            'confirm' => 'Você está prestes a realizar uma ação :action em :count servidores. Deseja continuar?',
            'action_failed' => 'A solicitação de ação de energia para ":name" (#:id) no node ":node" falhou com o erro: :message',
        ],
    ],
    'environment' => [
        'mail' => [
            'ask_smtp_host' => 'Host SMTP (ex.: smtp.gmail.com)',
            'ask_smtp_port' => 'Porta SMTP',
            'ask_smtp_username' => 'Usuário SMTP',
            'ask_smtp_password' => 'Senha SMTP',
            'ask_mailgun_domain' => 'Domínio do Mailgun',
            'ask_mailgun_endpoint' => 'Endpoint do Mailgun',
            'ask_mailgun_secret' => 'Segredo do Mailgun',
            'ask_mandrill_secret' => 'Segredo do Mandrill',
            'ask_postmark_username' => 'Chave da API do Postmark',
            'ask_driver' => 'Qual driver deve ser usado para enviar e-mails?',
            'ask_mail_from' => 'Endereço de e-mail de origem dos e-mails',
            'ask_mail_name' => 'Nome que deve aparecer nos e-mails',
            'ask_encryption' => 'Método de criptografia a ser usado',
        ],
    ],
];