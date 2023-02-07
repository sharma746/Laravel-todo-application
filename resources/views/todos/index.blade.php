@extends('app')
@section('content')
<style>
thead input {
        width: 100%;
    }
.fa-trash {
  color: red;
}
</style>
<div class="container">
@auth
<div class="row justify-content-center">
<div class="col-4">
<a class="btn btn-primary" href="javascript:void(0)" id="createNewTodo">Add Todo</a>
</div>   
<div class="col-4">
<p>Welcome <b>{{ Auth::user()->name }}</b></p>
</div>
<div class="col-4">
    <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
    <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
    </div>
</div>
@endauth
    <div class="row justify-content-center">
    <div class="col-12">
                <table id="claims"  class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>{{ $todo->status }}</td>
                            <td>
                            <a class="editPost" data-id="{{ $todo->id }}"><i class="fa fa-pencil"></i></a>
                            <form action="todo/{{$todo->id}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" style="background:none;border: none;"><i class="fa fa-trash" ></i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
					<tfoot>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div> 
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="todoForm" name="todoForm" class="form-horizontal">
                       <input type="hidden" name="todo_id" id="todo_id">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                                <textarea id="description" name="description" required="" placeholder="Enter Details" class="form-control"></textarea>
                            </div>
                        </div>
        
            
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

