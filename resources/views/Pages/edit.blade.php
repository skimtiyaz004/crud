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
						<form action="/updateTodo/{{$data->id}}" method="post">
							  {{ csrf_field() }}
							<label for="Todo">TO DO</label>
							<input type="text" name="todo" class="form-control" placeholder="enter To DO" value="{{$data->todo}}">
							 {!! $errors->first('todo', '<span class="help-block">:message</span>') !!}
							<label for="Date">Date</label>
							<input type="date"  value="{{$data->date}}" name="date" class="form-control" placeholder="enter date">
							{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
							<input type="submit" name="" class="btn btn-success" style="margin-top: 10px;">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>