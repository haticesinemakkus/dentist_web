<?php

namespace App\Http\Controllers\Panel;

use App\Models\Article;
use App\Models\ArticleCategory;
use View;

class ArticleController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Makale';
        $this->page = 'article';
        $this->upload = 'article';
        $this->model = new Article();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Makale' => route('panel.article_list'),
            ),
        );
        View::share('categories',ArticleCategory::get());
        parent::__construct();
    }
}
