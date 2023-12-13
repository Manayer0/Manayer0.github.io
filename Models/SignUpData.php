<?php
require_once('models/Database.php');
require_once ('models/UserDataSet.php');
class SignUpData
{
    protected $userID;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $confirmPassword;

    public function __construct($firstName, $lastName, $email, $password, $confirmPassword)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }
    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            echo "empty input !";
            header("location: views/index.php?error=emptyinput");
            exit();
        }
        if ($this->emptyInput() == false) {
            echo "empty input !";
            header("location: views/index.php?error=firstName");
            exit();
        }

        if ($this->invalidFirstName() == false) {
            echo "empty input !";
            header("location: views/index.php?error=firstName");
            exit();
        }
        if ($this->invalidLastName() == false) {
            echo "empty input !";
            header("location: views/index.php?error=lastName");
            exit();

        }
        if ($this->invalidEmail() == false) {
            echo "empty input !";
            header("location: views/index.php?error=email");
            exit();
        }
        if ($this->passwordMatch() == false) {


            echo "empty input !";
            header("location: views/index.php?error=passwordMatch");
            exit();
        }
            if ($this->userTakenCheck() == false) {
                echo "empty input !";
                header("location: views/index.php?error=userexist");
                exit();
            }
            $this->setUser($this->firstName, $this->lastName, $this->email, $this->password);
        }


// function that shows that there is an error if its empty
    public function emptyInput()
    {
        $result = null;
        if (empty ($this->firstName) || ($this->lastName) || ($this->email) || ($this->password) || ($this->confirmPassword)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;

    }
    // function that reject any special cases from the name

    private function invalidFirstName()
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->firstName)) {

            $result = false;
        }
    else {
            $result = true;
        }
return $result;
}
// function that reject any special cases from the name
    private function invalidLastName()
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->lastName)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    // function that makes sure that email is correct
    private function invalidEmail()
    {
    $result;
if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
    $result = false;
}
else{
    $result=true;
}
return $result;
    }
    // method that mak sure that password and passwordConfirm are the same
   private function passwordMatch()
{
    $result;
    if ($this->password !== $this->confirmPassword) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}
    private function userTakenCheck(){
        $result;
        if (!$this->checkUser($this->firstName , $this->lastName , $this->email)){
            $result = false;
        }
        else{
            $result=true;
        }
        return $result;
    }
}
// connect to database
