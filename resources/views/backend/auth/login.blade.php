<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/custom.css" rel="stylesheet">


</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">

                    <form  class="m-t" role="form" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input 
                            type="text" 
                            name="email"   
                            class="form-control" 
                            placeholder="Email"
                            value="{{old('email')}}" 
                            >
                            
                            @if ($errors->has('email'))
                                <span class="text-danger">* {{ $errors->first('email') }}</span>
                                
                            @endif
                        </div>
                        <div class="form-group">
                            <input 
                                type="password"
                                name="password" 
                                id="password" 
                                class="form-control" 
                                placeholder="Mật khẩu">
                            @if ($errors->has('password'))
                                <span class="text-danger">* {{ $errors->first('password') }}</span>
                            @endif
                            <div class="form-check mt-2">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    id="show-password" 
                                    onclick="togglePasswordVisibility()">
                                <label for="show-password" class="form-check-label">Hiển thị mật khẩu</label>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6 text-right">
               <small>© 2025</small>
            </div>
        </div>
    </div>
    <script src="backend/js/custom.js"></script>

</body>

</html>
