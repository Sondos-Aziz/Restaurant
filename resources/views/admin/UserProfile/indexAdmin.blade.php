        @extends('layouts.app')
        @push('css')

        @endpush

        @section('content')

        <div class="content">
        <div class="container-fluid">
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}


        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Admin Profile</h4>

              </div>
             <div class="card-body">

            <dt>
            Name
            </dt>
            <dd>
            {{$admin->name}}
            </dd>

            <dt >
            Email
            </dt>
            <dd>
            {{$admin->email}}
            </dd>

            <dt>
            Password
            </dt>
            <dd>
            {{$admin->password}}
            </dd>

            <dt>
            Image
            </dt>
            <dd>
                <img src =" {{asset('images/' . $admin->image)}}" height="100" width="150"/>
            </dd>




            <a href="{{route('dashboard.index')}}" class="btn btn-danger">Back</a>
            <a href="{{route('userProfile.edit',$admin->id)}}" class="btn btn-primary">Edit</a>
             </div>
        </div>
        </div>
        </div>
        @endsection

        @push('scripts')

        @endpush
