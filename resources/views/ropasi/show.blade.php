@extends('layouts.app')

@section('content')
    <rps-component
        rps_id = "{{ $ropasi->id }}"
    >
    </rps-component>

    <results-component
        rps_id = "{{ $ropasi->id }}"
        :all-results = "{{ $allresults }}"
        :your-results = "{{ $yourresults  }}"
    >
    </results-component>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
            </div>
        </div>
    </div>
@endsection
