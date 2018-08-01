<?php

class Role
{
    protected $permissions;

    protected function __construct()
    {
        $this->permissions = array();
    }

    public static function index()
    {
        $db = Connection::makeConnection();

        $sql = "SELECT id, name FROM roles
                ORDER BY id ASC";

        $res = $db->query($sql);
        $roles = $res->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }

    public static function destroy($id)
    {
        $db = Connection::makeConnection();
        $sql = "DELETE FROM roles WHERE id = :id";
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function store($options)
    {
        $db = Connection::makeConnection();
        $sql = "INSERT INTO roles(name)
                VALUES (:name)";
        $res = $db->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        return $res->execute();
    }

    public static function getRoleById($id)
    {

        $db = Connection::makeConnection();
        $sql = "SELECT name FROM roles
                WHERE id = :id";
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id);
        $res->execute();
        $role = $res->fetch(PDO::FETCH_ASSOC);
        return $role;
    }

    public static function update($id, $options)
    {

        $db = Connection::makeConnection();
        $sql = "UPDATE roles
                SET
                    name = :name
                WHERE id = :id
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function getRolePermission($id)
    {
        $db = Connection::makeConnection();
    
        $sql = "SELECT name FROM roles
                WHERE id = :id";
    
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id);
        $res->execute();
        
        $role = $res->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT permission_id FROM role_permission WHERE role_id = :role_id";
        
        $res = $db->prepare($sql);
        $res->execute(array(":role_id" => $id));
        $perms = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($perms, $row['permission_id']);
        }
        return array($role, $perms);
    }

    public static function insertPerm($role_id, $perm_id)
    {
        $sql = "INSERT INTO role_permission (role_id, permission_id) VALUES (:role_id, :perm_id)";
        $sth = Connection::makeConnection()->prepare($sql);
        return $sth->execute(array(":role_id" => $role_id, ":perm_id" => $perm_id));
    }

    // delete array of roles, and all associations
    public static function deleteRoles($role_id)
    {
        $sql = "DELETE t1, t2 FROM roles as t1
                JOIN role_permission as t2 on t1.id = t2.role_id
                WHERE t1.id = :role_id";
        
        $sth = Connection::makeConnection()->prepare($sql);
        
        $sth->bindParam(":role_id", $role_id, PDO::PARAM_INT);
        foreach ($roles as $role_id) {
            $sth->execute();
        }
        return true;
    }

    // check if a permission is set
    public function hasPerm($permission)
    {
        return isset($this->permissions[$permission]);
    }

    // return a role object with associated permissions
    public static function getRolePerms($role_id)
    {
        
        $db = Connection::makeConnection();

        $role = new Role();
        
        $sql = "SELECT t2.name FROM role_permission as t1
                JOIN permissions as t2 ON t1.permission_id = t2.id
                WHERE t1.role_id = :role_id";
        
        $sth = $db->prepare($sql);

        $sth->execute(array(":role_id" => $role_id));

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $role->permissions[$row["name"]] = true;
        }
        return $role;
    }

}
