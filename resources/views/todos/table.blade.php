@foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>{{ $todo->status }}</td>
                            <td>
                                <a class="editPost" ><i class="fa fa-pencil"></i></a>
                                <form action="todo/{{$todo->id}}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button type="submit" style="background:none;border: none;"><i class="fa fa-trash" ></i></button>
                                </form>
                            </td>
                        </tr>
 @endforeach