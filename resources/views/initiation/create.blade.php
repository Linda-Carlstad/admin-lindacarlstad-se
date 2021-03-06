@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till nollningsår</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>
    <form action="{{ '/initiation' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="year">År *</label>
            <input id="year" type="text" placeholder="Välj datum" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old( 'year' ) }}" required autofocus>

            @if ($errors->has('year'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('year' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description">Information</label>
            <textarea rows="3" id="description" type="text" placeholder="Text om nollningen" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old( 'description' ) }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="price">
                Pris <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Klicka i rutan för att visa priset på webbsidan"></i>
            </label>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input id="show_price" name="show_price" type="checkbox" aria-label="Checkbox for following number input"  value="{{ old( 'show_price' ) }}">
                    </div>
                </div>
                <input id="price" type="number" placeholder="Pris" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old( 'price' ) }}">
                <div class="input-group-append">
                    <span class="input-group-text">kr</span>
                </div>
            </div>
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="facebookGroup">Facebookgrupp-länk</label>
            <input id="facebookGroup" type="text" placeholder="Länk till nollningsgrupp" class="form-control{{ $errors->has('facebookGroup') ? ' is-invalid' : '' }}" name="facebookGroup"  value="{{ old( 'facebook_group' ) }}">

            @if ($errors->has('facebook_group'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('facebook_group' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="playlist">Spellista</label>
            <input id="playlist" type="text" placeholder="Länk till spellista" class="form-control{{ $errors->has('playlist') ? ' is-invalid' : '' }}" name="playlist"  value="{{ old( 'playlist' ) }}">

            @if ($errors->has('playlist'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('playlist' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="active" class="">Aktiv? *</label>
            <select class="form-control" id="active" name="active" required>
                <option value="1" selected>Ja</option>
                <option value="0">Nej</option>
            </select>
            @if ($errors->has('hidden'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hidden' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'initiation.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection
