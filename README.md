# Perspective Test
A 7 minute test that determines each team member's [Myers-Briggs Type Indicator]. Backend Laravel and Frontend React

## Instructions

### Project Backend configuration
1. Move the backend project to a folder like this:__
__
base_folder/ __
  perspective-backend

2. Clone the laradock git repo inside this folder:__
(git clone https://github.com/Laradock/laradock.git)__
__
base_folder/ __
  perspective-backend__
  laradock(repo)__
__
3. Go to laradock/nginx/sites and make a copy of laravel.conf.example rename one to perspective-backend.conf__
__
4. Open perspective-backend.conf in a text editor and make the following changes:__
server_name perspective.shift;__
root /var/www/perspective-backend/public;__
__
5. Open your hosts file (/etc/hosts on linux) in a text editor and add following add the end:__
127.0.0.1 perspective.shift__
__
6. Access phpMyAdmin in the browser on http:localhost:8081__
    - Credentials__
        - server: mysql__
        - username: root__
        - password: root__
__
    - create the database with name perspective.__
__
7. Go to perspective-backend folder and create the .env file by copying .env.example:__
    cp .env.example .env__
__
8. Go to laradock folder and copy a .env file__
cp env-example .env__
__
9. Build the containers with the following command:__
    docker-compose up -d nginx mysql phpmyadmin__
__
10. Start workspace and run migrate with:__
__
    docker-compose exec workspace bash__
    php artisan migrate__
__
### Project Frontend configuration__
GO to frontend folder perspective-frontend__
RUN: docker-compose up__