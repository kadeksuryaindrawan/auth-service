<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="SRBP : Sistem Rekomendasi Program Bantuan" />
	<meta name="author" content="SRB" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SRBP : Sistem Rekomendasi Program Bantuan" />
	<meta property="og:title" content="SRBP : Sistem Rekomendasi Program Bantuan" />
	<meta property="og:description" content="SRBP : Sistem Rekomendasi Program Bantuan" />

	<!-- PAGE TITLE HERE -->
	<title>SRPB - Register</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets') }}/images/icon.png" />
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<h3 class="text-primary" style="margin-top: 10px; letter-spacing:1px; font-weight:800;">SRPB</h3>
									</div>
                                    <h4 class="text-center mb-4">Silahkan lengkapi form dibawah</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label class="mb-1" for="username"><strong>Username</strong></label>
                                                <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" required>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="mb-1" for="email"><strong>Email</strong></label>
                                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="mb-1" for="password"><strong>Password</strong></label>
                                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="mb-1" for="password-donfirm"><strong>Confirm Password</strong></label>
                                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1" for="role"><strong>Daftar Sebagai</strong></label>
                                            <select name="role" class="form-select" id="role" required>
                                                <option value="" selected disabled>-Pilih-</option>
                                                <option value="desa">Desa</option>
                                                <option value="perguruantinggi">Perguruan Tinggi</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Sudah memiliki akun? <a class="text-primary" href="{{ url('/login') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom.min.js"></script>
    <script src="{{ asset('assets') }}/js/deznav-init.js"></script>

</body>
</html>

