@extends('web.layout.master')
@section('title')
Home
@endsection

@section('content')
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="/web/images/image1.png" width="100%"/>
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span id="titleLogin" class="active" onclick="login()">Login</span>
                        <span id="titleReg" onclick="register()">Register</span>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif
                    </div>

                    <!--                    <form id="LoginForm">-->
                    <!--                        <input type="text" placeholder="Username"/>-->
                    <!--                        <input type="password" placeholder="Password"/>-->
                    <!--                        <button type="submit" class="btn">Login</button>-->
                    <!--                        <a href="#">Forgot passsword</a>-->
                    <!--                    </form>-->
                    <form acction="{{ route('web.login')}}" method="POST" id="LoginForm" >
                        @csrf
                        <input id="username" name="email"  type="email" required placeholder="Email"/>
                        <input id="password" type="password" name="password" required placeholder="Password"/>
                        <button type="submit"   class="btn">Login</button>
                        <a href="#">Forgot passsword</a>
                    </form>

                     <!-- <form role="form" action="{{ route('admin.auth.check-login')}}" method="POST">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form> -->

                    <form action="{{ route('web.register') }}" method="POST" id="RegForm">
                        @csrf
                        <input id="use" type="text" name="name" placeholder="Username"/>
                        <input id="email" type="email" name="email" placeholder="Email"/>
                        <input id="pass" type="password" name="password" placeholder="Password"/>
                        <input id="pass" type="password" name="confirm" placeholder="Please Enter RePassword"/>
                        <button type="submit" id="btn-submit1" class="btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection