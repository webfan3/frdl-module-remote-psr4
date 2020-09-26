<?php

//$s['server'], $s['register'], $s['version'], $s['allowFromSelfOrigin'], $s['salted'], $s['classmap']
$meta = json_decode(file_get_contents('https://discover.api.webfan.de/.well-known/frdlweb.json'));
$servers = $meta->repository->psr4;

$endpoints = [];

foreach($servers as $server){
   $endpoint=[
      'server' => $server->url,
      'register' => (isset($server->register)) ? $server->register : true,
      'version' => (isset($server->register)) ? $server->version : 'latest',
      'allowFromSelfOrigin' => (isset($server->allowFromSelfOrigin)) ? $server->allowFromSelfOrigin : false,
      'salted' => (isset($server->salted)) ? $server->salted : true,
      'classmap' => (isset($server->classmap) && is_array($server->classmap)) ? $server->classmap :  [	  
        \Wehowski\Gist\Http\Response\Helper::class => 'https://gist.githubusercontent.com/wehowski/d762cc34d5aa2b388f3ebbfe7c87d822/raw/5c3acdab92e9c149082caee3714f0cf6a7a9fe0b/Wehowski%255CGist%255CHttp%255CResponse%255CHelper.php?cache_bust=${salt}',
      ],
      'prefix'=>'',
      'prependPrefix' =>false,
   ];
   $endpoints[]=$endpoint;
}

return [
  'api' => [
       'endpoints' => [
           'psr4' => $endpoints,
       ],
  ],

];
