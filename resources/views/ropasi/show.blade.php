@extends('layouts.app')

@section('content')
    <div class="toresults">
        <a href="{{ route('results') }}" class="btn btn-primary"> show all results</a>
    </div>
    <rps-component
        rps_id = "{{ $ropasi->id }}"
        computerscore = {{ $computerscore  }}
        humanscore = {{ $humanscore  }}
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
