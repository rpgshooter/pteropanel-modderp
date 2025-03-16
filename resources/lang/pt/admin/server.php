<?php

return [
    'exceptions' => [
        'no_new_default_allocation' => 'Você está tentando excluir a alocação padrão para este servidor, mas não há uma alocação de fallback para usar.',
        'marked_as_failed' => 'Este servidor foi marcado como tendo falhado em uma instalação anterior. O status atual não pode ser alterado neste estado.',
        'bad_variable' => 'Ocorreu um erro de validação com a variável :name.',
        'daemon_exception' => 'Ocorreu uma exceção ao tentar se comunicar com o daemon, resultando em um código de resposta HTTP/:code. Esta exceção foi registrada. (ID da solicitação: :request_id)',
        'default_allocation_not_found' => 'A alocação padrão solicitada não foi encontrada nas alocações deste servidor.',
    ],
    'alerts' => [
        'startup_changed' => 'A configuração de inicialização deste servidor foi atualizada. Se o nest ou egg deste servidor foi alterado, uma reinstalação ocorrerá agora.',
        'server_deleted' => 'O servidor foi excluído com sucesso do sistema.',
        'server_created' => 'O servidor foi criado com sucesso no painel. Por favor, aguarde alguns minutos para que o daemon instale completamente este servidor.',
        'build_updated' => 'Os detalhes de construção deste servidor foram atualizados. Algumas alterações podem exigir uma reinicialização para entrar em vigor.',
        'suspension_toggled' => 'O status de suspensão do servidor foi alterado para :status.',
        'rebuild_on_boot' => 'Este servidor foi marcado como exigindo uma reconstrução do contêiner Docker. Isso acontecerá na próxima vez que o servidor for iniciado.',
        'install_toggled' => 'O status de instalação deste servidor foi alterado.',
        'server_reinstalled' => 'Este servidor foi colocado na fila para reinstalação, começando agora.',
        'details_updated' => 'Os detalhes do servidor foram atualizados com sucesso.',
        'docker_image_updated' => 'A imagem padrão do Docker para este servidor foi alterada com sucesso. Uma reinicialização é necessária para aplicar essa alteração.',
        'node_required' => 'Você deve ter pelo menos um node configurado antes de adicionar um servidor a este painel.',
        'transfer_nodes_required' => 'Você deve ter pelo menos dois nodes configurados antes de transferir servidores.',
        'transfer_started' => 'A transferência do servidor foi iniciada.',
        'transfer_not_viable' => 'O node selecionado não possui espaço em disco ou memória suficientes para acomodar este servidor.',
    ],
];