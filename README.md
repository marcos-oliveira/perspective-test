# Perspective Test
A 7 minute test that determines each team member's [Myers-Briggs Type Indicator]. Backend Laravel and Frontend React

## Instructions

### Project Backend configuration
1. Move the backend project to a folder like this:<br />

&nbsp;&nbsp;base_folder/ <br />
&nbsp;&nbsp;&nbsp;&nbsp;perspective-backend

2. Clone the laradock git repo inside this folder:
(git clone https://github.com/Laradock/laradock.git)<br />
&nbsp;&nbsp;base_folder/ <br />
&nbsp;&nbsp;&nbsp;&nbsp;perspective-backend<br />
&nbsp;&nbsp;&nbsp;&nbsp;laradock(repo)

3. Go to laradock/nginx/sites and make a copy of laravel.conf.example and rename to perspective-backend.conf

4. Open perspective-backend.conf in a text editor and make the following changes:
 ```
server_name perspective.shift;
root /var/www/perspective-backend/public;
 ```
 
5. Open your hosts file (/etc/hosts on linux) in a text editor and add following add the end:
127.0.0.1 perspective.shift

6. Go to perspective-backend folder and create the .env file by copying .env.example:
```
  cp .env.example .env
```

7. Go to laradock folder and copy a .env file
```
  cp env-example .env
```

8. Build the containers with the following command:
```
docker-compose up -d nginx mysql phpmyadmin
```

9. Access phpMyAdmin in the browser on http:localhost:8081
  - Credentials
    - server: mysql
    - username: root
    - password: root
  - create the database with name perspective.

10. Start workspace and run migrate with:
```
  docker-compose exec workspace bash
  php artisan migrate
```
11. The Backend routes should be accessible from http://perspective.shift/api/(resource)


```
**Troubles connecting to the DB

I didn't, but if you have a problem with the mysql version, downgrade as follows:

a. Include MYSQL_VERSION=5.7 in the laradock env file, and change the value of DATA_PATH_HOST as follows:

    DATA_PATH_HOST=./data

b. Proceed the downgrade as below:

    docker-compose stop mysql # Delete old database data
    rm -rf laradock/data/mysql # ! Pay attention to restart the docker application, and then build a new mysql
    docker-compose build mysql

c. Run the containers and recreated the database as in the README file, from step 8 on.
```


### Run Project Frontend
  GO to frontend folder perspective-frontend and run:
```
docker-compose up
```
