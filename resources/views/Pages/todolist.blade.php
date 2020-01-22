<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  
	<title>Create TODo</title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
	<div class="conatiner">
		<div class="row">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>


			@endif
			  @if (  Session::get('success'))

			          <div class="alert alert-success">

			              <p>{{ Session::get('success') }}</p>

			          </div>

			    @endif
			     <a href="/" class="btn btn-info">Back</a>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Todo List
					</div>
					<div class="panel-body">
						<form action="/addTodo" method="post" enctype="multipart/form-data">
							  {{ csrf_field() }}
							<label for="Todo">TO DO</label>
							<input type="text" name="todo" class="form-control" placeholder="enter To DO">
							 {!! $errors->first('todo', '<span class="help-block">:message</span>') !!}
							<label for="Date">Date</label>
							<input type="date" name="date" class="form-control" placeholder="enter date">
							{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
							<input type="file" name="image">
							<input type="submit" name="" class="btn btn-success" style="margin-top: 10px;">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>