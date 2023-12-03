@extends($masterpage ?? 'panel.master')
@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach ($container->view->breadcrumb as $title => $href)
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
        <div class="panel">
            <div class="panel-hdr disabled-none">
                <h2>{{ $container->title }}</h2>
            </div>
            <form ajax-form method="POST" action="{{ route('panel.' . $container->page . '_save', ['unique' => $item->id]) }}">
                @csrf
                <div class="col-md-12 mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-control custom-switch" style="margin-bottom: 15px;float:left;margin-left: -30px">
                                    <strong>AYARLAR</strong>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Adres 1</label>
                                    <textarea rows="2" name="address1" class="form-control"  maxlength="250">{{ old('address1') ? old('address1') : $item->address1 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Adres 2</label>
                                    <textarea rows="2" name="address2" class="form-control"  maxlength="250">{{ old('address2') ? old('address2') : $item->address2 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Telefon Numarası 1</label>
                                    <input type="text" class="form-control" name="phone1" value="{{ old('phone1') ? old('phone1') : $item->phone1 }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Telefon Numarası 2</label>
                                    <input type="text" class="form-control" name="phone2" value="{{ old('phone2') ? old('phone2') : $item->phone2 }}" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Facebook Link</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook') ? old('facebook') : $item->facebook }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Instagram Link</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram') ? old('instagram') : $item->instagram }}" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Twitter Link</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter') ? old('twitter') : $item->twitter }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Linkedin Link</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : $item->linkedin }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">E-posta Adresi</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $item->email }}" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 ">
                        <button class="btn btn-primary ml-auto waves-effect waves-themed wd-100" type="submit">Kaydet</button>
                        <a class="btn btn-warning ml-auto waves-effect waves-themed wd-100 color-white" href="{{ route('panel.index') }}">İptal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extra_script')
<script>
    $('[gift_auto]').change(function(){
        var val = $(this).prop('checked');
        if(val) $("[gift_date]").prop( "disabled", false );
        else $("[gift_date]").prop( "disabled", true );

        if(val) $("[gift_repeat]").prop( "disabled", false );
        else $("[gift_repeat]").prop( "disabled", true );
    });

</script>
@endsection
