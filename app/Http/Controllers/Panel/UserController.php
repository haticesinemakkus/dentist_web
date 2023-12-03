<?php

namespace App\Http\Controllers\Panel;
use App\Http\Requests\UserSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Kullanıcılar';
        $this->page = 'user';
        $this->upload = 'user';
        $this->model = new User;

        $this->view = (object)array(
            'breadcrumb' => array(
                'Üyeler' => route('panel.user_list'),
            ),
        );

        parent::__construct();
    }

    public function list(Request $request)
    {
        if($request->has('datatable'))
        {
            $select = $this->model::select()->orderBy('id','desc');

            $obj = datatables()->of($select)
            ->editColumn('birthday', function ($item) {
                return (!is_null($item->birthday) ? $item->birthday->format('d.m.Y') : '-');
            })
            ->editColumn('last_login', function ($item) {
                return (!is_null($item->last_login) ? $item->last_login->format('d.m.Y H:i') : '-');
            })
            ->editColumn('created_at', function ($item) {
                return (!is_null($item->created_at) ? $item->created_at->format('d.m.Y H:i') : '-');
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

    public function saveForm(UserSaveRequest $request, $unique = NULL)
	{
        $params = $request->all();

        if(is_null($unique))
        {
            $exits = User::where('deleted_at',null)->where('tc', $request->tc)->orWhere('phone', $request->phone)->orWhere('email', $request->email)->first();
            if(!is_null($exits))
            {
                return redirect()->back()->with('success', 'Belirtilen bilgilere ait kullanıcı kaydı bulunuyo')->withInput();
            }

            $params['password'] = Hash::make($params['password']);
            $obj = $this->model::create($params);
        }
        else
        {
            $user_email = User::where('id',$unique)->first()->email;
            $exits = User::where('email', $request->email)->whereNotIn('email',[$user_email])->first();
            if(!is_null($exits))
            {
                return redirect()->back()->with('error', 'Bu mail adresi kaydı bulunuyor')->withInput();
            }

            if(!is_null($params['password']) && $params['password'] != '')
            {
                $params['password'] = Hash::make($params['password']);
            } else {
                unset($params['password']);
            }

            $obj = $this->model::find((int)$unique);
            $obj->update($params);
        }

		return redirect()->route("panel.user_list")->with('success', 'Kayıt başarıyla şekilde işlendi');
	}




    public function search(Request $request)
    {
        $datas = $this->model::where('tc', 'like', '%'.$request->q.'%')->select('id', 'name', 'surname', 'tc')->get();

        return $datas;
    }
    public function find(Request $request)
    {
        $user = User::find($request->user_id);

        return $user->point;
    }
}
