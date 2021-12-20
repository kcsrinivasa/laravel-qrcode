<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />
	<title>QR code generator</title>
	<style type="text/css">
     body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }
        .card{
        	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }


        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    </style>
</head>
<body>
<div class="m-5 p-5">
	<div class="card">
		<div class="card-header">
            QR Generator
          <div class="float-right"><a href="{{route('qrcode.scan')}}" class="btn btn-success">QR Scan</a></div>
        </div>
		<div class="card-body">
			<div class="row align-items-center">
				<div class="col-md-6">
					<form action="{{ route('qrcode.generate') }}" method="POST">
						@csrf
						<div class="form-group">
							<input type="text" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Enter Content" value="@if(isset($content)){{ $content }} @endif" >
						</div>

						<div class="form-group p-3 text-center">
							<button type="submit" class="btn btn-success">Generate</button>
						</div>

					</form>
				</div>
				<div class="col-md-6 text-center">
					@if(isset($qrCode))
						<img src="{{asset('public/'.$qrCode)}}" class="img-fluid">

						<br>
						<a href="{{ route('qrcode.download','simple') }}">download</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>