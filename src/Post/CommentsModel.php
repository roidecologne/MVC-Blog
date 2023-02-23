<?php
/**
 * Copyright © 2022 - Oliver Kloecker
 */

namespace App\Post;

use App\Core\AbstractModel;


class CommentsModel extends AbstractModel
{

        public $id;
        public $content;
        public $post_id;

}