<?php		
	class Email
	{
		public $subject = "";
		public $body = "";
		
		private $to = "";
		
		private function getEmailAddresses()
		{
			include 'dbConnections.php';	
			$query = $db->prepare("SELECT email FROM TeamMemberInfo WHERE login='true'");
			$query->execute();
			
			// grab first email address out and then format with commas before
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$this->to = stripslashes($row['email']);
			
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$this->to .= ', ' . stripslashes($row['email']);
			}
		}
		
		public function sendEmail()
		{			
			$this->getEmailAddresses();
			mail($this->to,$this->subject,$this->body,'From: no-reply@clemsoncfa.com');
			
		}	
	}
?>