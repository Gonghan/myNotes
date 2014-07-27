<?php
class DB{
	private $link=NULL;	
	private function connect(){
		$vcap=getenv("VCAP_SERVICES");
		if(!empty($vcap)){
			$services_json = json_decode(getenv("VCAP_SERVICES"),true);
			$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
			$username = $mysql_config["username"];
			$password = $mysql_config["password"];
			$hostname = $mysql_config["hostname"];
			$port = $mysql_config["port"];
			$db = $mysql_config["name"];
			$this->link = mysql_connect("$hostname:$port", $username, $password);
			$db_selected = mysql_select_db($db, $this->link);
		}else{
			$this->link=mysql_connect("localhost:3306","root","123456");
			$db_selected = mysql_select_db("notes", $this->link);
		}
		//$this->setup();
		return $this->link;
	}
	public function getDB(){
		if(isset($this->link)){
			return $this->link;
		}else{
			return $this->connect();
		}
	}
	
	public function setup(){
		//setup the table user
		$drop_old_users_table="DROP TABLE IF EXISTS users";
        mysql_query($drop_old_users_table);
		$create_user_table="CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT,name VARCHAR(255) NOT NULL,email VARCHAR(255) NOT NULL,password VARCHAR(255)NOT NULL,primary key(id));";
		mysql_query($create_user_table);
		echo 'Successfully created table users<br/>';
		//setup the table notes
		$drop_old_notes_table="DROP TABLE IF EXISTS notes";
        mysql_query($drop_old_notes_table);
		$create_notes_table="CREATE TABLE notes(id INT NOT NULL AUTO_INCREMENT,title VARCHAR(255) NOT NULL,name VARCHAR(255) NOT NULL,content VARCHAR(255)NOT NULL,updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,primary key(id));";
		mysql_query($create_notes_table);
        echo 'Successfully created table notes<br/>';
        echo 'Done<br/>';
	}
}
?>