<?php
// Parent
class Person
{
    public $firstname;
    public $lastname;
    public $address;
    public $dob;

    public function __construct($firstname, $lastname, $address, $dob)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->dob = $dob;
    }
}

// Child class Student inherits from Person
class Student extends Person
{
    public $course;

    public function __construct($firstname, $lastname, $address, $dob, $course)
    {
        parent::__construct($firstname, $lastname, $address, $dob);
        $this->course = $course;
    }

    // Serialize student data
    public function serializeData()
    {
        return serialize($this);
    }

    // Deserialize data
    public static function deserializeData($data)
    {
        return unserialize($data);
    }
}
?>
