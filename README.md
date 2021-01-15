# Perspective Test
A 7 minute test that determines each team member's [Myers-Briggs Type Indicator]. Backend Laravel and Frontend React

## Instructions

### Project Backend configuration
1. Move the backend project to a folder like this:

base_folder/ 
  perspective-backend

2. Clone the laradock git repo inside this folder:
(git clone https://github.com/Laradock/laradock.git)

base_folder/ 
  perspective-backend
  laradock(repo)

3. Go to laradock/nginx/sites and make a copy of laravel.conf.example rename one to perspective-backend.conf

4. Open perspective-backend.conf in a text editor and make the following changes:
server_name perspective.shift;
root /var/www/perspective-backend/public;

5. Open your hosts file (/etc/hosts on linux) in a text editor and add following add the end:
127.0.0.1 perspective.shift

6. Access phpMyAdmin in the browser on http:localhost:8081
    - Credentials
        - server: mysql
        - username: root
        - password: root

    - create the database with name perspective.

7. Go to perspective-backend folder and create the .env file by copying .env.example:
    cp .env.example .env

8. Go to laradock folder and copy a .env file
cp env-example .env

9. Build the containers with the following command:
    docker-compose up -d nginx mysql phpmyadmin

10. Start workspace and run migrate with:

    docker-compose exec workspace bash
    php artisan migrate

### Project Frontend configuration
GO to frontend folder perspective-frontend
RUN: docker-compose up