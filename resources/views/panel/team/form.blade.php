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
                                    <div class="col-12">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Ad</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $item->name }}" required>
                                            @error('name')
                                                <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Ünvan</label>
                                            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $item->title }}" required>
                                            @error('title')
                                                <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Açıklama</label>
                                            <input type="text" class="form-control" name="description" value="{{ old('description') ? old('description') : $item->description }}" required>
                                            @error('description')
                                                <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Resim</label>
                                            <input type="file" class="form-control" name="image" value="{{ old('image') ? old('image') : $item->image }}">
                                            @error('image')
                                                <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tabs -->

                            <!-- tabs -->
                            <div class="tab-pane fade" id="tab_set2" role="tabpanel">

                                <textarea rows="20" name="notes" class="form-control">{{ !is_null($item->notes) ?   $item->notes  : '' }}</textarea>

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
         $('[mask="phone"]').mask('(000) 000 00 00', {pattern: /[0-9*]/});
         $('[mask="tckimlik"]').mask('00000000000', {pattern: /[0-9*]/});
    </script>

@endsection
