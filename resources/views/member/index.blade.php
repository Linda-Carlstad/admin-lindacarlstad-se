@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Medlemmar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'member.create' ) }}">Lägg till medlem</a>
        @if( !$members->isEmpty() || isset( $search )  )
            <form class="col-md-8 offset-md-2 mt-2" action="{{ '/member' }}" method="get">
                @csrf

                <div class="form-group row">
                    <div class="input-group">
                        <input id="search" type="text" placeholder="Sök.." class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" value="{{ isset( $search ) ? $search : "" }}" autofocus>
                        @if ($errors->has('search'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('search' ) }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <button type="submit" name="button" class="btn btn-primary btn-file">Sök</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
    @if( isset( $search ) )
        <h4>Du sökte på: <i>{{ $search }}</i></h4>
        <h5>Antal resultat: <i>{{ $totalSearch }}</i></h5>
    @endif
    <h4 class="text-center">Antal: {{ $total }}</h4>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Namn</th>
                <th>Personnummer</th>
                <th>Email</th>
                <th>Medlemsår</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $members as $member )
                <tr>
                    <td>{{ $member->firstName }} {{ $member->lastName }}</td>
                    <td>{{ $member->id_number }}</td>
                    <td>{{ $member->email }}</td>
                    <td>Livstid {{ $member->membership != 'none' ? $member->membership : '' }}</td>
                    <td>
                        <a href="{{ url( 'member/' . $member->id . '/edit') }}" class="btn btn-link">
                            Redigera
                        </a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{ $members->links() }}

    @if( isset( $search ) )
        <hr>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route( 'member.index' ) }}">Visa alla</a>
        </div>
    @endif

@endsection
