@extends('layouts.app')

@section('content')
    <rps-component
        rps_id = "{{ $ropasi->id }}"
    >
    </rps-component>
    <results-component
        all-results = "{{ json_encode( $allresults ) }}"
        your-results = "{{ json_encode( $yourresults )  }}"
    >
    </results-component>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
            </div>
        </div>
    </div>
@endsection
