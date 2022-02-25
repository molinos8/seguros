<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Users;
use App\Models\UsersCategory;

class UsersRepository implements IRepository {

    /**
     * Return the main id of the users model
     *
     * @return int
     */
    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Function to persist one users
     *
     * @param array $data
     *
     * @return Users $usersId
     */
    public function persistOneUsers(array $data):Users
    {
        $usersData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => 'xx'
        ];
        $usersDB = new Users();
        $prodcutId = $usersDB::create($usersData);
        return $prodcutId;
    }

}