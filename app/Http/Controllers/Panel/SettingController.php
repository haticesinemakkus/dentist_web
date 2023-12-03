<?php
namespace App\Http\Controllers\Panel;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Ayarlar';
        $this->page = 'settings';
        $this->upload = 'settings';
        $this->model = new Settings();

        $this->validation = array(
            [

            ],
            [

            ],
        );

        $this->view = (object)array(
            'breadcrumb' => array(
                'Ayarlar ve İletişim' => '#',
            ),
        );

        parent::__construct();
    }

    public function saveHook(Request $request)
    {
        $params = $request->all();

        return $params;
    }

    public function saveBack($obj)
    {
        return redirect()->route("panel.".$this->page."_form" , ['unique' => 1],)->with('success', 'Kayıt başarılı şekilde işlendi');
    }

}

