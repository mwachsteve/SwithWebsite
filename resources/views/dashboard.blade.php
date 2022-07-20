<!DOCTYPE html>
<html>
<head>
    <title>SwitchLink Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">SwitcLink</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="{{ route('login') }}">Login</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Atm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="">Register</a> -->
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">ATM WITHDRAWAL</h3>
                    <div class="alert alert-success" role="alert">
                            {{ Session::get('data') }}
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('atmapi') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Amount" id="Balance" class="form-control" name="Balance" required
                                    autofocus>
                                @if ($errors->has('Balance'))
                                <span class="text-danger">{{ $errors->first('Balance') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">WITHDRAW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- transfer -->
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Transfer Funds</h3>
                    <div class="alert alert-success" role="alert">
                            {{ Session::get('tdata') }}
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('transferapi') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Amount" id="amount" class="form-control" name="amount" required
                                    autofocus>
                                @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Account Number" id="accountid" class="form-control" name="accountid" required>
                                @if ($errors->has('accountid'))
                                <span class="text-danger">{{ $errors->first('accountid') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">TRANSFER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- @yield('content') -->
</body>
</html>