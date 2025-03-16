<?php

return [
    'notices' => [
        'created' => 'Um novo nest, :name, foi criado com sucesso.',
        'deleted' => 'O nest solicitado foi excluído com sucesso do Painel.',
        'updated' => 'As opções de configuração do nest foram atualizadas com sucesso.',
    ],
    'eggs' => [
        'notices' => [
            'imported' => 'Este Egg e suas variáveis associadas foram importados com sucesso.',
            'updated_via_import' => 'Este Egg foi atualizado usando o arquivo fornecido.',
            'deleted' => 'O Egg solicitado foi excluído com sucesso do Painel.',
            'updated' => 'A configuração do Egg foi atualizada com sucesso.',
            'script_updated' => 'O script de instalação do Egg foi atualizado e será executado sempre que servidores forem instalados.',
            'egg_created' => 'Um novo Egg foi criado com sucesso. Você precisará reiniciar quaisquer daemons em execução para aplicar este novo Egg.',
        ],
    ],
    'variables' => [
        'notices' => [
            'variable_deleted' => 'A variável ":variable" foi excluída e não estará mais disponível para servidores após a reconstrução.',
            'variable_updated' => 'A variável ":variable" foi atualizada. Você precisará reconstruir quaisquer servidores que usam essa variável para aplicar as alterações.',
            'variable_created' => 'Uma nova variável foi criada com sucesso e atribuída a este Egg.',
        ],
    ],
];