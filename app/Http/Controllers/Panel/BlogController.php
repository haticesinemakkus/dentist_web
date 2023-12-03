<?php

namespace App\Http\Controllers\Panel;

use App\Models\Blog;
use App\Models\BlogCategory;
use View;

class BlogController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Bloglar';
        $this->page = 'blog';
        $this->upload = 'blog';
        $this->model = new Blog();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Bloglar' => route('panel.blog_list'),
            ),
        );

        View::share('categories',BlogCategory::get());
        parent::__construct();
    }
}
