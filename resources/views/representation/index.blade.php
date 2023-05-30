@extends('layouts.main')

@section('title','Liste des représentations')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">{{__('Lieu')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($representations as $representationGroup)
            <tr class="table-warning">
                <th colspan="3">{{ $representationGroup[0]->show->title}}
                    <em>{{ $representationGroup[0]->show->price ? ' - '.$representationGroup[0]->show->price.'€' : '' }}</em></td>
                </th>
            </tr>
            @foreach($representationGroup as $representation)
                <tr>
                    <td><datetime>{{ substr($representation->when,0,-3) }}</datetime></td>
                    <td>
                        @if($representation->location)
                            {{ $representation->location->designation }}
                        @endif
                    </td>
                    <td style="text-align:right">
                            @if($representation->show->bookable && $representation->when > now())
                                <a class="button"  href="{{ route('representation.show', $representation->id) }}">{{__('Réserver')}}</a>
                            @else
                            <a class="button"  href="{{ route('show.show', $representation->show->id) }}">{{__('Voir')}}</a>
                            @endif        
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection