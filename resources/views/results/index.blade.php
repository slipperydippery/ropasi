@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Here are some results:</h1>
        </div>
    </div>

    <div class="row pt-2">
        <div class="col-12">
            <div class="h2">Graph of all results:</div>
            <cumulative-results-component
                :all-results = "{{ $allresults }}"
            >
            </cumulative-results-component>
        </div>
    </div>


    <div class="row container mx-auto pt-5">
        <div class="col-12">
            <div class="h2">Individual sessions:</div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">wins</th>
                    <th scope="col">losses</th>
                    <th scope="col">draws</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($allropasis as $ropasi)
                        <tr>
                            <th scope="row"> {{ $ropasi->id  }} </th>
                            <td> {{ $ropasi->results->where('winner', 2)->count()  }} </td>
                            <td> {{ $ropasi->results->where('winner', 1)->count()  }} </td>
                            <td> {{ $ropasi->results->where('winner', 0)->count()  }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
