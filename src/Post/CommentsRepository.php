<?php
/**
 * Copyright © 2022 - Oliver Kloecker
 */

namespace App\Post;

use App\Core\AbstractRepository;

class CommentsRepository extends AbstractRepository

{
    public function getTableName() {
        return "comments";
    }

    public function getModelName() {
        return "App\\Post\\CommentsModel";
    }

    public function getPostById($id) {
        $table = $this->getTableName();
        $model = $this->getModelName();

        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE post_id = :id");
        $stmt->execute(['id' => $id]);
        $comments = $stmt->fetchAll(\PDO::FETCH_CLASS, $model);

        return $comments;
    }

}