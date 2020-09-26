<?php
call_user_func(function(){
    //\Webfan\Psr4Loader\RemoteFromWebfan::getInstance('frdl.webfan.de', true, 'latest', true);
    $classmap = [	          
                \Wehowski\Gist\Http\Response\Helper::class => 'https://gist.githubusercontent.com/wehowski/d762cc34d5aa2b388f3ebbfe7c87d822/raw/5c3acdab92e9c149082caee3714f0cf6a7a9fe0b/Wehowski%255CGist%255CHttp%255CResponse%255CHelper.php?cache_bust=${salt}',          
            ];
    $configfile = \hiqdev\composer\config\Builder::path('api');
    if(file_exists($configfile)){    
        $apiConfig = require $configfile;    
        if(is_array($apiConfig) && isset($apiConfig['api']['endpoints']['psr4'])){        
            \Webfan\Psr4Loader\RemoteFromWebfan::getInstance($apiConfig['api']['endpoints']['psr4'], true, 'latest', false, true,  $classmap); 
        }
        
        if(is_array($apiConfig) && isset($apiConfig['api']['endpoints']['remote_autoload'])){        
            \Webfan\Psr4Loader\RemoteFromWebfan::getInstance($apiConfig['api']['endpoints']['remote_autoload'], true, 'latest', false, true,  $classmap); 
        }
    }
});
