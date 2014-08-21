MyNotes
=========

MyNotes is a cloud-based note-taking app.

  - Take notes
  - Explore cloud development

The app is deployed on AppFog. You can check the url: http://mynotes.aws.af.cm/.
If that link doesn't work, use this one: http://54.183.179.198/myNotes.


You can try to use the test account: {email=wanggonghan@gmail.com, password=123456}.
Version
----

1.0

Tech
-----------

MyNotes uses a number of tools or services:

* **JQuery** - a fast, small, and feature-rich JavaScript library
* **Twitter** Bootstrap - great UI boilerplate for modern web apps
* **MySQL** - the world's most popular open source database
* **PHP** - a server-side scripting language designed for web development but also used as a general-purpose programming language
* **AppFog** - Simple PaaS for Java, Node, Ruby, PHP, MySQL, Mongo, PostgreSQL, and more

Installation
--------------

```sh
cd apache_path/www/
git clone git@github.com:Gonghan/myNotes.git
cd myNotes
vim ./core/db.php
```
Change the MySQL username, password, host, and port in db.php.
If you want to run it on your local machine, change the line 17 in db.php:

```sh
$this->link=mysql_connect("localhost:3306","root","123456");
```
Open the url: ./notes/core/api/setup.php to finish the database setup.

```sh
mysql -u username -p
>> [your_password]
>> create database notes;
```
Prerequisite
----
* Apache web server 2+
* PHP 5.4+
* MySQL 5.1+

License
----

MIT
