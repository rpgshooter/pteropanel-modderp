<?php

return [
    'validation' => [
        'fqdn_not_resolvable' => 'O FQDN ou endereço IP fornecido não resolve para um endereço IP válido.',
        'fqdn_required_for_ssl' => 'Um nome de domínio totalmente qualificado (FQDN) que resolva para um endereço IP público é necessário para usar SSL neste node.',
    ],
    'notices' => [
        'allocations_added' => 'As alocações foram adicionadas com sucesso a este node.',
        'node_deleted' => 'O node foi removido com sucesso do painel.',
        'location_required' => 'Você deve configurar pelo menos uma localização antes de adicionar um node a este painel.',
        'node_created' => 'Node criado com sucesso. Você pode configurar automaticamente o daemon nesta máquina visitando a aba \'Configuração\'. <strong>Antes de adicionar qualquer servidor, você deve alocar pelo menos um endereço IP e porta.</strong>',
        'node_updated' => 'As informações do node foram atualizadas. Se alguma configuração do daemon foi alterada, você precisará reiniciá-lo para que as mudanças entrem em vigor.',
        'unallocated_deleted' => 'Todas as portas não alocadas para <code>:ip</code> foram excluídas.',
    ],
];