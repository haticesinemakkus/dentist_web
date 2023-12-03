<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;

class CommentController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Müşteri Yorumları';
        $this->page = 'comment';
        $this->upload = 'comment';
        $this->model = new Comment();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Müşteri Yorumları' => route('panel.comment_list'),
            ),
        );

        parent::__construct();
    }
}
