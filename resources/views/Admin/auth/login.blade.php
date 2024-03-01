@extends('layouts.auth')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-9">

                <div class="card o-hidden border-0 shadow-lg " style="margin-top:20vh">
                    <div class="card-body ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">

                                    <form class="user" method="post" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="اكتب الايميل">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="اكتب الباسورد">
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">سجل</button>



                                    </form>
                                    @if ($errors->any())
                                        <hr>
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="text-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
