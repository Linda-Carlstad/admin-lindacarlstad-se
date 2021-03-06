@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>{{ $keyPerson->name }}</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>

    <form action="{{ '/person/' . $keyPerson->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="name">Namn *</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $keyPerson->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="rank">Rank *</label>
            <select class="form-control{{ $errors->has('rank') ? ' is-invalid' : '' }}" id="rank" name="rank" required>
                <option value="General" {{ old( 'rank', $keyPerson->rank ) == 'General' ? 'selected' : '' }}>General</option>
                <option value="Kapten" {{ old( 'rank', $keyPerson->rank ) == 'Kapten' ? 'selected' : '' }}>Kapten</option>
                <option value="Vice kapten" {{ old( 'rank', $keyPerson->rank ) == 'Vice kapten' ? 'selected' : '' }}>Vice kapten</option>
                <option value="Annat" {{ old( 'rank', $keyPerson->rank ) == 'Annat' ? 'selected' : '' }}>Annat</option>
            </select>
            @if ($errors->has('rank'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('rank' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="initiation_id">Nollningsår *</label>
            <select class="form-control{{ $errors->has('initiation_id') ? ' is-invalid' : '' }}" id="initiation_id" name="initiation_id" required>
                @foreach( $initiations as $initiation )
                    <option value="{{ $initiation->id  }}" {{ $initiation->id == $keyPerson->initiation_id ? 'selected' : '' }}>{{ $initiation->year }}</option>
                @endforeach
            </select>
            @if ($errors->has('initiation_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('initiation_id' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="label">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $keyPerson->email }}" >
            <small class="text-muted">Tänk på att dessa publiceras online, rekommenderas att endast anävnda adresser med "@lindacarlstad.se".</small>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="phone">Telefonnummer</label>
            <input id="phone" type="tel" placeholder="Telefonnummer" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $keyPerson->phone }}" >

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone' ) }}</strong>
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
    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här personen? Denna åtgärd är permanent.');" action="{{ '/person/' . $keyPerson->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
        <div class="text-center">
            <h4>Ta bort nyckelperson</h4>
            <p>Denna åtgärd är permanent.</p>
            <button type="submit" class="btn btn-danger">
                Ta bort
            </button>
        </div>
    </form>

@endsection
