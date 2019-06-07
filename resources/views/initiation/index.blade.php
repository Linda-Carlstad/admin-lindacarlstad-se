@extends('layouts.app')
@section('content')

    @if( session()->has( 'success' ) )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get( 'success' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if( session()->has( 'error' ) )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get( 'error' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="text-center mb-2">
        <h2>Nollning - Dagar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.create' ) }}">Lägg till dag</a>
    </div>

    @if( $days->isEmpty() )
        <p class="text-center">
            Inga dagar skapade, skapa en nu!
        </p>
    @else
        <h4 class="text-center">Dagar: {{ $days->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Titel</th>
                    <th>Datum</th>
                    <th>Order</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($days as $day)
                    <tr>
                        <td>{{ $day->title }}</td>
                        <td>{{ $day->date }}</td>
                        <td>{{ $day->order }}</td>
                        <td>
                            <a href="{{ url( 'initiation/' . $day->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <hr>
    <div class="text-center">
        <p>
            Tillbaka till...
        </p>
        <a class="btn btn-primary m-1" href="{{ route( 'initiationHandle' ) }}">Nollning</a>
    </div>




@endsection