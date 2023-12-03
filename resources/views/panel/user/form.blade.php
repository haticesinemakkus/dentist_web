@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach($container->view->breadcrumb as $title => $href)
    <li class="breadcrumb-item"><a href="{{ $href }}">{{ $title }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">{{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">

        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link fs-lg px-4 active" data-toggle="tab" href="#tab_set1" role="tab">Genel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-lg px-4" data-toggle="tab" href="#tab_set2" role="tab">Notlar</a>
            </li>
        </ul>

        <div id="panel-1" class="panel" style="border-top: none;">
            <form ajax-form method="POST" action="{{ route('panel.' . $container->page . '_save', ['unique' => $item->id]) }}" enctype="multipart/form-data">
                @csrf

                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="tab-content p-1">

                            <!-- tabs -->
                            <div class="tab-pane fade show active" id="tab_set1" role="tabpanel">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Ad</label>
                                            <input type="text" class="form-control" name="name" value="{{ $item->name ?? old('name') }}" required>
                                            @error('name')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Soyad</label>
                                            <input type="text" class="form-control" name="surname" value="{{ $item->surname ?? old('surname')  }}" required>
                                            @error('surname')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">E-Posta Adresi</label>
                                            <input type="email" class="form-control" name="email" value="{{ $item->email ?? old('email')  }}" required autocomplete="off">
                                            @error('email')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Telefon</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $item->phone ?? old('phone')  }}" required autocomplete="off" mask="phone">
                                            @error('phone')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Kimlik Numarası</label>
                                            <input type="text" class="form-control" name="tc" value="{{ $item->tc ?? old('tc')  }}" required mask="tckimlik">
                                            @error('tc')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Şifre</label>
                                            <input type="password" class="form-control" name="password" {{ is_null($item->id) ? 'required' : '' }} autocomplete="off">
                                            @error('password')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Cinsiyet</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="1" {{ $item->gender == 1 && !is_null($item->id) ? 'selected' : '' }}>Kadın</option>
                                                <option value="2" {{ $item->gender == 2 && !is_null($item->id) ? 'selected' : '' }}>Erkek</option>
                                            </select>
                                            @error('gender')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Doğum Tarihi</label>
                                            <input type="date" class="form-control" name="birthday" value="{{ !is_null($item->birthday) ? $item->birthday->format('Y-m-d') : null }}">
                                            @error('birthday')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Durum</label>
                                            <select class="form-control" name="is_active" required>
                                                <option value="1" {{ $item->is_active == 1 || is_null($item->id) ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ $item->is_active == 0 && !is_null($item->id) ? 'selected' : '' }}>Pasif</option>
                                            </select>
                                            @error('is_active')
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- tabs -->

                            <!-- tabs -->
                            <div class="tab-pane fade" id="tab_set2" role="tabpanel">

                                <textarea rows="20" name="notes" class="form-control">{{ !is_null($item->notes) ? Crypt::decryptString($item->notes) : '' }}</textarea>

                            </div>
                            <!-- tabs -->

                        </div>

                    </div>


                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 ">
                        <button class="btn btn-primary ml-auto waves-effect waves-themed wd-100" type="submit">Kaydet</button>
                        <a class="btn btn-warning ml-auto waves-effect waves-themed wd-100 color-white" href="{{ route('panel.' . $container->page . '_list') }}">İptal</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection


@section('extra_script')

    <script>
         $('[mask="phone"]').mask('#(000) 000 00 00', {pattern: /[0-9*]/});
         $('[mask="tckimlik"]').mask('00000000000', {pattern: /[0-9*]/});
    </script>

@endsection
