# phpcl_jumpstart_doctrine
Source Code for PHP-CL Doctrine JumpStart Course

## VM
* Install `docker`
  * CentOS: https://docs.docker.com/install/linux/docker-ce/centos/#install-docker-ce
  * Debian: https://docs.docker.com/install/linux/docker-ce/debian/
  * Fedora: https://docs.docker.com/install/linux/docker-ce/fedora/
  * Ubuntu: https://docs.docker.com/install/linux/docker-ce/ubuntu/
  * Windows: https://docs.docker.com/docker-for-windows/install/
  * Mac: https://docs.docker.com/docker-for-mac/install/
* Pull the latest `Linux for PHP` image
  * See: https://hub.docker.com/r/asclinux/linuxforphp-8.1-ultimate/tags/
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
docker run -dit --restart=always --name phpcl_jumpstart_doctrine -v ${PWD}/:/srv/www -p 8181:80 -p 10443:443 -p 2222:22 --mount source=jumpstart,target=/srv/jumpstart asclinux/linuxforphp-8.1-ultimate:7.3-nts lfphp
```
* Get container ID
```
docker container ls
```
* Open a shell to the container
```
docker exec -it <container_ID> /bin/bash
// or
docker exec -it phpcl_jumpstart_doctrine /bin/bash
```
* Restore files from repo for course
```
cd /srv/jumpstart
git clone https://github.com/phpcl/phpcl_jumpstart_doctrine
```
* Restore database and assign privileges
```
# mysql
MariaDB [(none)]>
CREATE DATABASE `jumpstart`;
USE `jumpstart`;
CREATE USER 'test'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `jumpstart`.`*` TO 'test'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `jumpstart`.`*` TO 'test'@'localhost' IDENTIFIED BY 'password';
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
