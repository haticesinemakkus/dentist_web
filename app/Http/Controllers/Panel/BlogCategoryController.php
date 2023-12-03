<?php

namespace App\Http\Controllers\Panel;

use App\Models\BlogCategory;

class BlogCategoryController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Blog Kategorileri';
        $this->page = 'blog_category';
        $this->upload = 'blog_category';
        $this->model = new BlogCategory();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Blog Kategorileri' => route('panel.blog_category_list'),
            ),
        );

        parent::__construct();
    }
}
