<?php

class Argonautes extends Database
{

    private $id;
    private $lastname;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function addMember(STRING $membersName)
    {
        $query = "INSERT INTO `argonautes_members` (membersName) VALUES (:membersName);";
        $queryaddMember = parent::getDb()->prepare($query);
        $queryaddMember->bindValue("membersName", $membersName, PDO::PARAM_STR);

        if ($queryaddMember->execute()) {
            return $queryaddMember;
        } else {
            return false;
        }
    }

    public function getAllMembers()
    {
        $query = "SELECT `membersName` FROM `argonautes_members`;";
        $buildQuery = $this->getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    // public function getOnePatients($patientId)
    // {
    //     $query = "SELECT * FROM Patients WHERE id = :patientId";
    //     $queryGetOnePatients = parent::getDb()->prepare($query);
    //     $queryGetOnePatients->bindValue("patientId", $patientId, PDO::PARAM_INT);
    //     $queryGetOnePatients->execute();
    //     $resultsQuery = $queryGetOnePatients->fetch();
    //     if (!empty($resultsQuery)) {
    //         return $resultsQuery;
    //     } else {
    //         return false;
    //     }
    // }

    // public function updatePatient($patientId, $lastname, $firstname, $birthdate, $phone, $mail)
    // {
    //     $query = "UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :patientId";
    //     $queryUpdatePatient = parent::getDb()->prepare($query);
    //     $queryUpdatePatient->bindValue("patientId", $patientId, PDO::PARAM_STR);
    //     $queryUpdatePatient->bindValue("lastname", $lastname, PDO::PARAM_STR);
    //     $queryUpdatePatient->bindValue("firstname", $firstname, PDO::PARAM_STR);
    //     $queryUpdatePatient->bindValue("birthdate", $birthdate, PDO::PARAM_STR);
    //     $queryUpdatePatient->bindValue("phone", $phone, PDO::PARAM_STR);
    //     $queryUpdatePatient->bindValue("mail", $mail, PDO::PARAM_STR);

    //     return $queryUpdatePatient->execute();
    // }
}
