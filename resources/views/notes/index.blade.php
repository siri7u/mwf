
@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card">
            <div class="card-header">

                <div class="input-group">
                    <a class="btn btn-primary" href="/notes/create">Add new note</a>
                    <input type="text" class="form-control search" placeholder="Chercher dans toutes les notes ...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="lds-ring" style="background-color: black"></div>
                <svg id="spinner" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; ; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> <g transform="rotate(0 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(30 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(60 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(90 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(120 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(150 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(180 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(210 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(240 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(270 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(300 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(330 50 50)"> <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate> </rect> </g></svg>
                <div class="list-group">
                    @foreach ( $res as $note)
                        <a href="/notes/{{ $note->id }}" class="">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ \Illuminate\Support\Str::limit($note->text, 150, $end='...') }}
                                <span class="badge badge-primary badge-pill"> {{ $note->created_at }}</span>
                            </li>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>



    </div>

    <script src="/js/notes.js"></script>
@endsection
