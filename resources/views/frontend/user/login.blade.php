<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFlow</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .wrapper{
        background-image: url("{{ asset('backend') }}/img/iflow.jpg");
        background-position: bottom center;
        background-repeat:  no-repeat;
        background-size: cover;
        overflow: hidden;
        min-height: 100%;
        min-width: 100%;
        padding: 0 0 126px;
        }
        .wrapper input{
            background-color: azure;
            color: gray;
        }
        .wrapper input:focus{
            box-shadow: none;
        }
        .wrapper .small-btn{
            padding: 15px;
            font-size: 15px;
        }
        .wrapper .login-with{
            padding: 15px;
            font-weight: 400;
            transition: 0.3s ease-in-out;
        }
        .wrapper .small-btn:focus,
        .wrapper .login-with:focus{
            box-shadow: none;
        }
        .wrapper .login-with:hover{
            background-color: gray;
            border-color: grey;
        }
    </style>
    
</head>
<body>
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class=" col-lg-4 offset-lg-4 text-center" style="margin-top: 100px;">
                    
                    <form action="{{ Route('login.user') }}" class="rounded p-5 shadow bg-white" method="POST">
                        @csrf
                        <div class="logo">
                            <img src="{{ asset('backend') }}/img/iflow_logo.jpg" class="img-fluid rounded-circle my-1" alt=""  style="width: 100px; height: 100px; border-radius: 50%;">
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <div>
                            <label for="user_name"></label>
                            <input value="{{ old('user_name') }}" type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter User Name">
                            <span class="text-danger">
                                @error('user_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <label for="user_password"></label>
                            <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Enter Password">
                            <span class="text-danger">
                                @error('user_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <!-- <div class="mt-2 text-end">
                                <a href="" class="text-decoration-none text-primary fw-bold">Forget Password?</a>
                        </div> -->
                        <button type="submit" class="btn btn-primary small-btn w-100 my-4">Sign In</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script src="{{ asset('backend') }}/script.js"></script>

</body>
</html>