@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (Auth::guard('admin')->check())
                            Hi Boss
                        @endif
                        @if (Auth::guard('agent')->check())
                            Hi Agent
                        @endif
                        @if (Auth::user())
                            Hi 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection