<?php

class UsersModel extends BaseModel
{
    function getALL()
    {
        $statement = self::$db->query(
            "SELECT * FROM  users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    //function all posts by user
    function getAllPostsById(){
        $statement = self::$db->prepare(
            "SELECT title, content, date FROM posts JOIN users " .
            "ON posts.user_id = users.id WHERE users.id = ?");
        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;

    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id= ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;

    }

    public function edit(int $id, string $username, string $full_name) : bool
    {
        $statement = self::$db->prepare("UPDATE users SET username = ?, " .
            "full_name = ? WHERE id = ?");
        $statement->bind_param("ssi", $username, $full_name, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    public function register(string $username, string $password, string $full_name){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = self::$db->prepare(
            "INSERT INTO users (username, password_hash, full_name) VALUES (?,?,?)");
        $statement->bind_param("sss", $username, $password_hash, $full_name);
        $statement->execute();
        if($statement->affected_rows != 1)
            return false;
        $user_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $user_id;
    }

    public function loginAdmin(int $id){
        $statement = self::$db->prepare(
            "SELECT users.isAdmin FROM users WHERE users.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password_hash FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        if(password_verify($password, $result['password_hash']))
            return $result['id'];
            return false;

    }



}
