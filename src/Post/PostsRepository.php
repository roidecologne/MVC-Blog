<?php
namespace App\Post;

use App\Core\AbstractRepository;
use PDO;

class PostsRepository extends AbstractRepository
{

    public function getTableName() {
        return "posts";
    }

    public function getModelName() {
        return "App\\Post\\PostModel";
    }

}

?>
