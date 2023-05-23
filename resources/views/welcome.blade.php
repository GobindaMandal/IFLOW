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
        padding: 0 0 611px;
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
       
        <a class="btn btn-success mt-2 mx-2" style="font-weight:bold; font-family:serif; border-color:#04AA6D" href="{{ Route('login') }}" type="button">Log On</a>

            
        
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

</body>
</html>