@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Redigera {{ $initiationDay->title }}</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>

    <form action="{{ '/day/' . $initiationDay->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="title">Titel *</label>
            <input id="title" type="text" placeholder="Position" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $initiationDay->title }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="initiation_id">Nollningsår *</label>
            <select class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" id="initiation_id" name="initiation_id" required>
                @foreach( $initiations as $initiation )
                    <option value="{{ $initiation->id  }}" {{ $initiation->id == $initiationDay->initiation_id ? 'selected' : '' }}>{{ $initiation->year }}</option>
                @endforeach
            </select>
            @if ($errors->has('initiation_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('initiation_id' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="date">Datum *</label>
            <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ $initiationDay->date }}" required>

            @if ($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description">Beskrivning</label>
            <textarea rows="4" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $initiationDay->description }}</textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="extra" class="">Extra information</label>
            <input id="extra" type="text" placeholder="Extra information till dagen" class="form-control{{ $errors->has('extra') ? ' is-invalid' : '' }}" name="extra" value="{{ $initiationDay->extra }}">

            @if ($errors->has('extra'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('extra' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="time">Tid</label>
            <input id="time" type="text" placeholder="Tid" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ $initiationDay->time }}">

            @if ($errors->has('time'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('time' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="location">Plats</label>
            <input id="location" type="text" placeholder="Plats" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $initiationDay->location }}">

            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'day.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>
    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här dagen? Denna åtgärd är permanent.');" action="{{ '/day/' . $initiationDay->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort nollningsdag</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
