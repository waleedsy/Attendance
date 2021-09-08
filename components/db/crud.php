<?php 
    class crud
    {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        //function to insert a new record into the attendants database
        public function insertattendees($fname, $lname, $dob, $email, $category, $contact)
        {
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendees(firstname,lastname,dob,email,contact,category_id) VALUES (:fname,:lname,:dob,:email,:contact,:category)";
                
                //prepare the sql statement for execution
                $stmt = $this -> db -> prepare($sql);

                //bind all placeholders to the actual values
                $stmt -> bindparam(':fname',$fname);
                $stmt -> bindparam(':lname',$lname);
                $stmt -> bindparam(':dob',$dob);
                $stmt -> bindparam(':email',$email);
                $stmt -> bindparam(':category',$category);
                $stmt -> bindparam(':contact',$contact);

                //execute statement
                $stmt -> execute();
                return true;

            } 
            
            catch (\PDOException $e) {
    
                echo $e->getMessage();
                return false;
            }

        }

        public function editattendee($id, $fname, $lname, $dob, $email, $category, $contact)
        {

            try
            {

                $sql = "UPDATE `attendees` SET `firstname`= :fname,`lastname` = :lname, `email`= :email,
                `contact`= :contact,`category_id`= :category,`dob`= :dob WHERE attendees_ID = :id";

                $stmt = $this -> db -> prepare($sql);

                //bind all placeholders to the actual values
                $stmt -> bindparam(':id',$id);
                $stmt -> bindparam(':fname',$fname);
                $stmt -> bindparam(':lname',$lname);
                $stmt -> bindparam(':dob',$dob);
                $stmt -> bindparam(':email',$email);
                $stmt -> bindparam(':category',$category);
                $stmt -> bindparam(':contact',$contact);


                //execute statement
                $stmt -> execute();
                return true;

            }    

            catch (\PDOException $e) 
            {
    
                echo $e->getMessage();
                return false;

            }
           
        }

        public function getattendees()
        {
            try
            {
                $sql = "SELECT * FROM `attendees` inner join specialties on specialty_id = specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }

            catch (\PDOException $e) 
            {
   
               echo $e->getMessage();
               return false;
            }

        }

        public function getuserdetails($id)
        {
            try 
            {
                $sql = "SELECT * FROM attendees inner join specialties on specialty_id = specialty_id WHERE attendees_ID = :id";
                $stmt = $this -> db -> prepare($sql);
                $stmt->bindparam("id",$id);   
                $stmt -> execute ();
                $result = $stmt -> fetch();
                return $result;
            }
         

            catch (\PDOException $e) 
            {
   
               echo $e->getMessage();
               return false;

            }
        }

        public function deleteattendee($id)
        {
            try 
            {
                $sql = "delete from attendees where attendees_ID = :id";
                $stmt = $this -> db -> prepare($sql);
                $stmt->bindparam("id",$id);   
                $stmt -> execute ();
                return true;
            }
    
        
            catch (\PDOException $e) 
            {
                echo $e->getMessage();
                return false;
            }
        }
       



        public function getspecialties()
        {
            try
            {
                $sql = "SELECT * FROM `specialties` ";
                $result = $this-> db->query($sql);
                return $result;

            }     
          
            catch (\PDOException $e) 
            {
   
               echo $e->getMessage();
               return false;

            }

        }


    }

?>