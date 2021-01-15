# Perspective Test
A 7 minute test that determines each team member's [Myers-Briggs Type Indicator]. Backend Laravel and Frontend React

## Instructions

### Project Backend configuration
1. Move the backend project to a folder like this:<br />
<br />
base_folder/ <br />
  perspective-backend

2. Clone the laradock git repo inside this folder:<br />
(git clone https://github.com/Laradock/laradock.git)<br />
<br />
base_folder/ <br />
  perspective-backend<br />
  laradock(repo)<br />
<br />
3. Go to laradock/nginx/sites and make a copy of laravel.conf.example rename one to perspective-backend.conf<br />
<br />
4. Open perspective-backend.conf in a text editor and make the following changes:<br />
server_name perspective.shift;<br />
root /var/www/perspective-backend/public;<br />
<br />
5. Open your hosts file (/etc/hosts on linux) in a text editor and add following add the end:<br />
127.0.0.1 perspective.shift<br />
<br />
6. Access phpMyAdmin in the browser on http:localhost:8081
  - Credentials
    - server: mysql
    - username: root
    - password: root
  - create the database with name perspective.<br />
<br />
7. Go to perspective-backend folder and create the .env file by copying .env.example:<br />
  cp .env.example .env<br />
<br />
8. Go to laradock folder and copy a .env file<br />
  cp env-example .env<br />
<br />
9. Build the containers with the following command:<br />
  docker-compose up -d nginx mysql phpmyadmin<br />
<br />
10. Start workspace and run migrate with:<br />
<br />
  docker-compose exec workspace bash<br />
  php artisan migrate<br />
<br />
### Project Frontend configuration<br />
  GO to frontend folder perspective-frontend<br />
  RUN: docker-compose up<br />