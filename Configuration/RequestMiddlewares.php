<?php

return [
    'frontend' => [
        'ccm/ccm-event-handling/ev' => [
            'target' => \Ccm\CcmEventHandling\Middleware\CustomEventContext::class,
            'after' => [
                'typo3/cms-frontend/authentication',
            ],
        ],
    ],
];
