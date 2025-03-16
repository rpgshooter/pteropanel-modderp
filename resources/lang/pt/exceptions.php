<?php

return [
    'daemon_connection_failed' => 'Ocorreu uma exceção ao tentar se comunicar com o daemon, resultando em um código de resposta HTTP/:code. Esta exceção foi registrada.',
    'node' => [
        'servers_attached' => 'Um node não pode ser excluído se houver servidores vinculados a ele.',
        'daemon_off_config_updated' => 'A configuração do daemon <strong>foi atualizada</strong>, mas ocorreu um erro ao tentar atualizar automaticamente o arquivo de configuração no Daemon. Você precisará atualizar manualmente o arquivo de configuração (config.yml) do daemon para aplicar essas alterações.',
    ],
    'allocations' => [
        'server_using' => 'Um servidor está atualmente atribuído a esta alocação. Uma alocação só pode ser excluída se nenhum servidor estiver atribuído.',
        'too_many_ports' => 'A adição de mais de 1000 portas em um único intervalo não é suportada.',
        'invalid_mapping' => 'O mapeamento fornecido para :port é inválido e não pôde ser processado.',
        'cidr_out_of_range' => 'A notação CIDR só permite máscaras entre /25 e /32.',
        'port_out_of_range' => 'As portas em uma alocação devem ser maiores que 1024 e menores ou iguais a 65535.',
    ],
    'nest' => [
        'delete_has_servers' => 'Um Nest com servidores ativos vinculados não pode ser excluído do Painel.',
        'egg' => [
            'delete_has_servers' => 'Um Egg com servidores ativos vinculados não pode ser excluído do Painel.',
            'invalid_copy_id' => 'O Egg selecionado para copiar um script não existe ou está copiando um script de outro Egg.',
            'must_be_child' => 'A diretiva "Copiar Configurações De" para este Egg deve ser uma opção filha para o Nest selecionado.',
            'has_children' => 'Este Egg é pai de um ou mais outros Eggs. Exclua esses Eggs antes de excluir este Egg.',
        ],
        'variables' => [
            'env_not_unique' => 'A variável de ambiente :name deve ser única para este Egg.',
            'reserved_name' => 'A variável de ambiente :name é protegida e não pode ser atribuída a uma variável.',
            'bad_validation_rule' => 'A regra de validação ":rule" não é uma regra válida para este aplicativo.',
        ],
        'importer' => [
            'json_error' => 'Ocorreu um erro ao tentar analisar o arquivo JSON: :error.',
            'file_error' => 'O arquivo JSON fornecido não é válido.',
            'invalid_json_provided' => 'O arquivo JSON fornecido não está em um formato reconhecível.',
        ],
    ],
    'subusers' => [
        'editing_self' => 'Não é permitido editar sua própria conta de subusuário.',
        'user_is_owner' => 'Você não pode adicionar o proprietário do servidor como subusuário deste servidor.',
        'subuser_exists' => 'Um usuário com esse endereço de e-mail já está atribuído como subusuário para este servidor.',
    ],
    'databases' => [
        'delete_has_databases' => 'Não é possível excluir um servidor de banco de dados que tenha bancos de dados ativos vinculados a ele.',
    ],
    'tasks' => [
        'chain_interval_too_long' => 'O intervalo máximo de tempo para uma tarefa encadeada é de 15 minutos.',
    ],
    'locations' => [
        'has_nodes' => 'Não é possível excluir uma localização que tenha nodes ativos vinculados a ela.',
    ],
    'users' => [
        'node_revocation_failed' => 'Falha ao revogar chaves no <a href=":link">Node #:node</a>. :error',
    ],
    'deployment' => [
        'no_viable_nodes' => 'Nenhum node que satisfaça os requisitos especificados para implantação automática foi encontrado.',
        'no_viable_allocations' => 'Nenhuma alocação que satisfaça os requisitos para implantação automática foi encontrada.',
    ],
    'api' => [
        'resource_not_found' => 'O recurso solicitado não existe neste servidor.',
    ],
];