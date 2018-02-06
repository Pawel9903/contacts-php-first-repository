<?php
include_once('user.php');
include_once('db.php');
/**
* 
*/
class Contacts 
{
	public $contacts;
	public $db;
	public $userData;

	function __construct($pdo,$id_user){
		$this->db = $pdo;
		$this->userData = $this->db->query("SELECT * FROM users WHERE id_user=".$id_user)->fetchAll(PDO::FETCH_ASSOC);
	}

	function getContacts($sort){
			$this->contacts = $this->db->query("SELECT * FROM contacts WHERE id IN(SELECT id_contact FROM number_contacts WHERE id_user=".$this->userData['0']['id_user'].") ORDER BY ".$sort)->fetchAll(PDO::FETCH_ASSOC);
	}

	function addContact($name,$surname,$phone,$address,$email,$category,$note){


			$results=$this->db->prepare("INSERT INTO contacts(name,surname,phone,email,address,categoryId,note) VALUES (:name,:surname,:phone,:email,:address,:categoryId,:note)");
						$results->bindparam(':name',$name);
						$results->bindparam(':surname',$surname);
						$results->bindparam(':phone',$phone);
						$results->bindparam(':email',$email);
						$results->bindparam(':address',$address);
						$results->bindparam(':categoryId',$category);
						$results->bindparam(':note',$note);
						$results->execute();
						
						$new_id = $this->db->lastInsertId();

			$connect_user_and_contact = $this->db->prepare("INSERT INTO number_contacts (id_user,id_contact) VALUES (:id_user,:id_contact)");
				$connect_user_and_contact->bindparam(':id_user',$this->userData['0']['id_user']);
				$connect_user_and_contact->bindparam(':id_contact',$new_id);
				$connect_user_and_contact->execute();
				}

		function deleteContact($id_contact){
			$results = $this->db->prepare("DELETE FROM contacts WHERE id=:id");
			$results->bindparam(':id',$id_contact);
			$results->execute();
		}

		function editContact($id,$name,$surname,$phone,$address,$email,$category,$note){
		

			$results=$this->db->prepare("UPDATE contacts SET name=:name,surname=:surname,phone=:phone,email=:email,address=:address,categoryId=:categoryId,note=:note WHERE id=:id");
						$results->bindparam(':id',$id);
						$results->bindparam(':name',$name);
						$results->bindparam(':surname',$surname);
						$results->bindparam(':phone',$phone);
						$results->bindparam(':email',$email);
						$results->bindparam(':address',$address);
						$results->bindparam(':categoryId',$category);
						$results->bindparam(':note',$note);
						$results->execute();
		}
}