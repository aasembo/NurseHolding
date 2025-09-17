<?php
return [
    'App' => [
        'fullBaseUrl' => 'http://demo.nurseholding.dataratiba.com',
        'authDriver' => 'okta',
        'okta' => [
            'issuer' => 'https://integrator-1025653.okta.com/oauth2',
            'clientId' => '0oav7djsidSNarREk697',
            'clientSecret' => 'PEDe20l1aDPAJgqCcG78SiEHfMxX5GVbJvAUl4F6H2xB71hShw9qj59OEGPT2Qcl',
            'redirectUri' => 'http://demo.nurseholding.dataratiba.com/auth/callback/',
            'postLogoutRedirectUri' => 'http://demo.nurseholding.dataratiba.com/logout/complete',
            'scopes' => ['openid', 'profile', 'email'],
            'usePkce' => true,
        ],
    ],
];

