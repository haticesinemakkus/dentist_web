<?php

namespace App\Http\Controllers\Panel;

use App\Models\ArticleCategory;

class ArticleCategoryController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Makale Kategorileri';
        $this->page = 'article_category';
        $this->upload = 'article_category';
        $this->model = new ArticleCategory();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Makale Kategorileri' => route('panel.article_category_list'),
            ),
        );

        parent::__construct();
    }
}
