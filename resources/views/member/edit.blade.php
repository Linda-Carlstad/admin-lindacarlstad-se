@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>{{ $member->firstName }} {{ $member->lastName }}</h2>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/member/' . $member->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <input type="text" name="type" value="manual" hidden>
        <div class="form-group row">
            <label for="firstName" class="">Förnamn</label>
            <input id="firstName" type="text" placeholder="Förnamn" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ $member->firstName }}" required>

            @if ($errors->has('firstName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('firstName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="lastName" class="">Efternamn</label>
            <input id="lastName" type="text" placeholder="Efternamn" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ $member->lastName }}" required>

            @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="id_number" class="">Personnummer</label>
            <input id="id_number" type="text" placeholder="Personnummer" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ $member->id_number }}" required>

            @if ($errors->has('id_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_number' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="">Email</label>
            <input id="email" type="text" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $member->email }}" required>

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="membership" class="text-muted">Medlemskap</label>
            <select class="form-control" id="membership" name="membership">
                <option value="Livstid">Livstid</option>
                <option value="Tillfälligt">Tillfälligt</option>
            </select>
            @if ($errors->has('membership'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('membership') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="start" class="">Startår</label>
            <input id="start" type="text" placeholder="Startår" class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" name="start" value="{{ date( 'Y' ) }}" required>

            @if ($errors->has('start'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('start' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'member.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection