# phpcl_jumpstart_doctrine
Source Code for _PHP-CL JumpStart: Doctrine_ Course

## VM
* Install `docker`
* Create a volume `jumpstart`
```
docker volume create jumpstart
```
* Identify the location
```
docker volume ls
docker volume inspect jumpstart
```
* Run PHP for Linux image and mount the volume
```
docker run -dit --restart=always -v ${PWD}/:/srv/www -p 8181:80 -p 10443:443 -p 2222:22 --mount source=jumpstart,target=/srv/jumpstart asclinux/linuxforphp-8.1-ultimate:7.3-nts lfphp
```
* Get container ID
```
docker container ls
```
* Open a shell to the container
```
docker exec -it <container_ID> /bin/bash
```
* Restore files from repo for course
```
cd /srv/jumpstart
git clone https://github.com/dbierer/phpcl_jumpstart_doctrine
```
* Install Doctrine ORM
```
cd /srv/jumpstart/phpcl_jumpstart_doctrine
php composer install
```
* Restore database and assign privileges
```
# mysql
MariaDB [(none)]>
CREATE DATABASE `jumpstart`;
USE `jumpstart`;
CREATE USER 'test'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'test'@'localhost';
FLUSH PRIVILEGES;
SOURCE /srv/jumpstart/phpcl_jumpstart_doctrine/sample_data/jumpstart.sql;
exit
```
* Connect repo to container web server
```
ln -s /srv/jumpstart/phpcl_jumpstart_doctrine /srv/www/jumpstart
```
* Access container web site from your browser
```
http://localhost:8181/jumpstart
```
