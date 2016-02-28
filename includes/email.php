<?php		
	class Email
	{
		public $subject = "";
		public $body = "";
		
		private $to = "";
		
		private function getEmailAddresses($dev = false)
		{
			include 'dbConnections.php';	
			if($dev)
			{
				$email = " AND email = 'sheldonjuncker@gmail.com'";
			}
			
			else
			{
				$email = "";
			}
			$query = $db->prepare("SELECT email FROM TeamMemberInfo WHERE login='true'$email");
			$query->execute();
			
			// grab first email address out and then format with commas before
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$this->to = stripslashes($row['email']);
			
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$this->to .= ', ' . stripslashes($row['email']);
			}
		}
		
		public function sendEmail($dev = false)
		{			
			$this->getEmailAddresses($dev);
			mail($this->to,$this->subject,$this->body,'From: no-reply@clemsoncfa.com');
			
		}	
	}
?>