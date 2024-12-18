CREATE DATABASE bookstore;
CREATE USER 'root'@'localhost' IDENTIFIED BY 'Ra_090302_Di';
GRANT ALL PRIVILEGES ON bookstore.* TO 'root'@'localhost';
FLUSH PRIVILEGES;