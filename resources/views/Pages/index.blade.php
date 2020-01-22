<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <title>Todo List</title>
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
	<div class="container">
	  @if (  Session::get('success'))

		          <div class="alert alert-success">

		              <p>{{ Session::get('success') }}</p>

		          </div>

		    @endif
		<div class="row">
			
			<div class="col-md-4 col-md-offset-4">
				<a href="/createTodo" class="btn btn-success">Add To Do</a>
			</div>
				
			<div class="col-md-6 col-md-offset-3">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Todo List</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
						
					</thead>
					<tbody>
						@foreach($todos as $todo)
						<tr>
							<td>{{$todo['todo']}}</td>
							<td>{{$todo['date']}}</td>
							<td>
								<a href="/edittodo/{{$todo['id']}}">Edit</a>
								<a href="/deleteTodo/{{$todo['id']}}">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $todos->links() }}
			</div>
		</div>
	</div>
	
</body>
</html>