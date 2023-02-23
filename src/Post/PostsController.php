<?php

namespace App\Post;

use App\Core\AbstractController;

class PostsController extends AbstractController
{

    private CommentsRepository $commentsRepository;
    private PostsRepository $postsRepository;

    public function __construct(PostsRepository $postsRepository, CommentsRepository $commentsRepository )
  {
      $this->postsRepository = $postsRepository;
      $this->commentsRepository = $commentsRepository;
  }

    /**
     * @return void
     */
    public function index(): void
  {

      $posts = $this->postsRepository->all();
      $this->render("post/index", ['posts' => $posts]);

  }

    /**
     * @return void
     */
    public function show()
  {
    $id = $_GET['id'];
    $post = $this->postsRepository->find($id);
    $comments = $this->commentsRepository->getPostById($id);
    $this->render("post/show", ['post' => $post, 'comments' => $comments]);
  }
}

 ?>
