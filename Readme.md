# LAMP Application Hosting on AWS

## Project Overview

This project demonstrates the deployment of a simple LAMP (Linux, Apache, MySQL, PHP) application on AWS using Amazon EC2 and Amazon RDS.

The application is hosted on an EC2 instance running Apache Web Server and PHP, while the MySQL database is hosted on Amazon RDS. The project validates successful connectivity between the application server and the database server.

---

## Architecture

```text
User
  │
  ▼
Amazon EC2
(Amazon Linux)
  │
  ▼
Apache Web Server
  │
  ▼
PHP Application
  │
  ▼
Amazon RDS MySQL
```

---

## AWS Services Used

* Amazon EC2
* Amazon RDS (MySQL)
* Security Groups
* VPC

---

## Technology Stack

| Component        | Technology         |
| ---------------- | ------------------ |
| Operating System | Amazon Linux 2023  |
| Web Server       | Apache HTTP Server |
| Language         | PHP                |
| Database         | MySQL              |
| Cloud Platform   | AWS                |

---

## Project Objectives

* Deploy a PHP application on AWS.
* Configure Apache Web Server.
* Create and manage a MySQL database using Amazon RDS.
* Establish secure communication between EC2 and RDS.
* Validate database connectivity through a PHP application.

---

## Deployment Steps

### 1. Launch EC2 Instance

* Launch an Amazon Linux 2023 EC2 instance.
* Configure Security Group rules:

  * SSH (22)
  * HTTP (80)
  * HTTPS (443)

### 2. Connect to EC2

```bash
ssh -i key.pem ec2-user@<EC2-PUBLIC-IP>
```

### 3. Install Apache

```bash
sudo yum update -y
sudo yum install httpd -y

sudo systemctl start httpd
sudo systemctl enable httpd
```

### 4. Install PHP

```bash
sudo yum install php php-mysqlnd php-cli php-json php-fpm -y
```

Verify installation:

```bash
php -v
```

### 5. Create PHP Test Page

```php
<?php
phpinfo();
?>
```

### 6. Create Amazon RDS MySQL Database

* Engine: MySQL
* Template: Free Tier
* Instance Class: db.t3.micro
* Configure username and password

### 7. Configure Security Groups

Allow MySQL access (Port 3306) from the EC2 Security Group.

### 8. Connect to RDS

```bash
mysql -h <RDS-ENDPOINT> -u admin -p
```

### 9. Create Database

```sql
CREATE DATABASE companydb;
```

### 10. Create PHP Database Connection

```php
<?php

$host = "YOUR_RDS_ENDPOINT";
$user = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$database = "companydb";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed");
}

echo "Database Connected Successfully";

?>
```

---

## Project Structure

```text
aws-lamp-application-hosting/
│
├── index.html
├── info.php
├── db.php
└── README.md
```

---

## Key Features

* LAMP Stack Deployment on AWS
* Apache Web Server Configuration
* PHP Runtime Setup
* Amazon RDS MySQL Integration
* Secure EC2-to-RDS Connectivity
* Database Connectivity Validation

---

## Learning Outcomes

* Understanding LAMP Architecture
* AWS EC2 Administration
* Amazon RDS Database Management
* Linux Server Configuration
* Apache Web Server Management
* PHP and MySQL Integration
* Security Group Configuration
* Cloud Application Hosting

---

## Future Enhancements

* Add CRUD functionality
* Implement user authentication
* Configure HTTPS using SSL/TLS
* Deploy behind a Load Balancer
* Integrate Auto Scaling
* Containerize using Docker

---

## Conclusion

This project demonstrates the deployment of a basic LAMP application on AWS by integrating Amazon EC2, Apache, PHP, and Amazon RDS MySQL. It provides hands-on experience with cloud infrastructure, web server configuration, database connectivity, and secure networking in AWS.
