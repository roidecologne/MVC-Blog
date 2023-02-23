<?php

namespace App\Core;

use PDO;
use App\Post\PostsRepository;
use App\Post\CommentsRepository;
use App\Post\PostsController;
use PDOException;

class Container
{

    private $receipts = [];
    private $instances = [];

    public function __construct()
    {
        $this->receipts = [
            'postsController' => function () {
                return new PostsController(
                    $this->make('postsRepository'),
                    $this->make('commentsRepository')
                );
            },
            'postsRepository' => function () {
                return new PostsRepository(
                    $this->make("pdo")
                );
            },
            'commentsRepository' => function () {
                return new CommentsRepository(
                    $this->make("pdo")
                );
            },
            'pdo' => function () {
                try {
                    $pdo = new PDO(
                        'mysql:host=localhost;dbname=blog;port=3306;charset=utf8',
                        'dbuser',
                        '2xugsqvd'
                    );
                } catch (PDOException $e) {
                    echo 'Keine Verbindung'.$e;
                    die();
                }
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            }
        ];
    }

    public function make($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name]();
        }

        return $this->instances[$name];
    }

}

?>
