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
}
