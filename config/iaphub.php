<?php

return [
  "api_key"          => env("IAPHUB_API_KEY"),
  "app_id"           => env("IAPHUB_APP_ID"),
  "env"              => env("IAPHUB_APP_ENV"),
  "hook_token"       => env("IAPHUB_HOOK_TOKEN"),
  "route_middleware" => 'iaphub_disabled', // comma separated values e.g 'auth:api,auth:web'
];
