<?php

namespace App\Http\Controllers\Panel;
use App\Http\Requests\AdminSaveRequest;
use App\Http\Requests\ProfilSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use View;

class AdminController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Yöneticiler';
        $this->page = 'admin';
        $this->model = new Admin;

        $this->view = (object)array(
            'breadcrumb' => array(
                'Ayarlar' => '#',
                'Yöneticiler' => route('panel.admin_list'),
            ),
        );

        parent::__construct();
    }

    public function list(Request $request)
    {
        if($request->has('datatable'))
        {
            $select = $this->model::select();

            $obj = datatables()->of($select)
            ->editColumn('last_login', function ($item) {
                return (!is_null($item->last_login) ? $item->last_login->format('d.m.Y H:i') : '-');
            })
            ->addIndexColumn()->make(true);

            return $obj;
        }

        return view("panel.$this->page.list");
    }

    public function form(Request $request, $unique = NULL)
    {
        if(!is_null($unique))
        {
            $item = $this->model::find((int)$unique);

            if(is_null($item))
                return redirect()->back()->with('error', 'Kayıt bulunamadı');
        } else {
            $item = new $this->model;
        }

        return view("panel.$this->page.form", compact('item'));
    }

    public function saveForm(AdminSaveRequest $request, $unique = NULL)
	{
        //parametreler
		$params = $request->all();

        if(is_null($unique))
        {
            $params['password'] = Hash::make($params['password']);
            $obj = $this->model::create($params);
        }
        else
        {
            if(!is_null($params['password']) && $params['password'] != '')
            {
                $params['password'] = Hash::make($params['password']);
            } else {
                unset($params['password']);
            }

            $obj = $this->model::find((int)$unique);
            $obj->update($params);
        }

		return redirect()->route("panel.admin_list")->with('success', 'Kayıt başarıyla şekilde işlendi');
	}

    /* Profile */
    public function profile(Request $request)
    {
        $item = Admin::find(Auth::user()->id);

        return view('panel.admin.profile', compact('item'));
    }

    public function profile_save(ProfilSaveRequest $request)
    {
        $user = Admin::find(Auth::user()->id);
        $params = $request->validated();

        $user->update([
            'name' => $params['name'],
            'surname' => $params['surname'],
            'email' => $params['email'],
            'phone' => $params['phone'],
            'password' => isset($params['new_password']) ? Hash::make($params['new_password'])  : $user->password,
        ]);

        return redirect()->route("panel.profile")->with('success', 'Profil bilgileriniz kaydedildi');
    }

}
