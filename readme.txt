php artisan migrate
set the keys of pusher in env file
set BROADCAST_DRIVER=pusher in env file
vendor\guzzlehttp\guzzle\src\Client.php search for $default =>set verify=false
composer require pusher/pusher-php-server
php artisan config:clear
php artisan storage:link