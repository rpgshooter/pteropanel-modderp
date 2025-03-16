<?php

return [
    'email' => [
        'title' => 'Atualize seu e-mail',
        'updated' => 'Seu endereço de e-mail foi atualizado.',
    ],
    'password' => [
        'title' => 'Altere sua senha',
        'requirements' => 'Sua nova senha deve ter pelo menos 8 caracteres.',
        'updated' => 'Sua senha foi atualizada.',
    ],
    'two_factor' => [
        'button' => 'Configurar Autenticação de Dois Fatores',
        'disabled' => 'A autenticação de dois fatores foi desativada em sua conta. Você não será mais solicitado a fornecer um token ao fazer login.',
        'enabled' => 'A autenticação de dois fatores foi ativada em sua conta! A partir de agora, ao fazer login, você precisará fornecer o código gerado pelo seu dispositivo.',
        'invalid' => 'O token fornecido é inválido.',
        'setup' => [
            'title' => 'Configurar autenticação de dois fatores',
            'help' => 'Não consegue escanear o código? Insira o código abaixo no seu aplicativo:',
            'field' => 'Insira o token',
        ],
        'disable' => [
            'title' => 'Desativar autenticação de dois fatores',
            'field' => 'Insira o token',
        ],
    ],
];