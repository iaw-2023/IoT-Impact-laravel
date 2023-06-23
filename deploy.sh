#!/bin/bash

source /home/wecher/Scripts/telegram.sh

send "Starting deploy: Burger Planet (laravel)"

# Para que funcione sin problemas NPM
#export NVM_DIR="/home/wecher/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"


echo "ACTUALIZANDO REACT"
cd /home/wecher/Git/IoT-Impact-laravel/
git pull
npm install
npm run build

echo "OPTIMIZANDO..."
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache


send "End deploy: Burger Planet (laravel)"

