@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<div class="card">
    <br>
    <h3>@lang('Importações')</h3>
    <form method="POST" action="{{ route('importacoes.storeImport') }}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-">
            <label class="form-label">@lang('Animais')</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{old('file')}}">
            @if ($errors->has('file'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-outline btn-primary" type="submit">@lang('Importar')</button>
        </div>
    </form>
 
</div>
@stop

