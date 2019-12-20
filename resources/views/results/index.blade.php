@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Here are some results:</h1>
        </div>
    </div>

    <div class="row pt-2">
        <div class="col-12">
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
                    <th scope="col">human wins</th>
                    <th scope="col">human loses</th>
                    <th scope="col">draws</th>
                    <th scope="col">human score</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($allropasis as $ropasi)
                        <tr>
                            <th scope="row"> {{ $ropasi->id  }} </th>
                            <td> {{ $ropasi->results->where('winner', 2)->count()  }} </td>
                            <td> {{ $ropasi->results->where('winner', 1)->count()  }} </td>
                            <td> {{ $ropasi->results->where('winner', 0)->count()  }} </td>
                            <td> {{ $ropasi->results->where('winner', 2)->count() - $ropasi->results->where('winner', 1)->count() }} </td>
                        </tr>
                    @endforeach
                    <tr class="table-primary">
                        <th scope="row" >total</th>
                        <td> {{ $allresults->where('winner', 2)->count()  }} </td>
                        <td> {{ $allresults->where('winner', 1)->count()  }} </td>
                        <td> {{ $allresults->where('winner', 0)->count()  }} </td>
                        <td> {{ $allresults->where('winner', 2)->count() -  $allresults->where('winner', 1)->count()  }} </td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row" >percentage</th>
                        <td> {{ round($allresults->where('winner', 2)->count() * 100 / $allresults->count(), 2)  }} </td>
                        <td> {{ round($allresults->where('winner', 1)->count() * 100 / $allresults->count(), 2)    }} </td>
                        <td> {{ round($allresults->where('winner', 0)->count() * 100 / $allresults->count(), 2)    }} </td>
                        <td> -- </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
