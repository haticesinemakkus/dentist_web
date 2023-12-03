@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach($container->view->breadcrumb as $title => $href)
    <li class="breadcrumb-item"><a href="{{ $href }}">{{ $title }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">{{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</li>

    <li class="position-absolute pos-top pos-right d-none d-sm-block">
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>{{ $container->title }} {{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</h2>
            </div>
            <form ajax-form method="POST" action="{{ route('panel.' . $container->page . '_save', ['unique' => $item->id]) }}" enctype="multipart/form-data">
                @csrf

                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label class="form-label">Soru</label>
                                    <input type="text" class="form-control" name="question" value="{{ old('question') ? old('question') : $item->question }}" required>
                                </div>
                                @error('question')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label class="form-label">Cevap</label>
                                    <input type="text" class="form-control" name="answer" value="{{ old('answer') ? old('answer') : $item->answer }}" required>
                                </div>
                                @error('answer')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label class="form-label">Sıra</label>
                                    <input type="number" class="form-control" name="order" value="{{ old('order') ? old('order') : $item->order }}" required>
                                </div>
                                @error('order')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
