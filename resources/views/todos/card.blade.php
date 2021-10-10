@if(!is_null($todo->expiration_date)
        && $todo->expiration_date < date('Y-m-d'))
<div class="row red-text"> {{-- print them with red --}}
@else
<div class="row">
@endif
   <div class="col s12 m12">
     <div class="card white">
       <div class="card-content">
         <span class="card-title">{{$todo->name}}</span>
         <p>{{$todo->description}}</p>
         <table>
           <tr>
             <th>@lang('todo.expire')</th>
             <td><nobr>{{$todo->expiration_date}}</nobr></td>
           </tr>
           <tr>
             <th>Assigned users:</th>
             <td><ul>
               @foreach ($todo->users_assigned as $user)
                <li>
                  {{$user->name}}
                </li>
               @endforeach
             </ul></td>
           </tr>
           <tr>
             <th>Assign new user:</th>
             <td>
               <form action="{{route('todos.assign', $todo->id)}}" method="POST">
                 @csrf
                 <input type="hidden" name="todo_id" value="{{$todo->id}}">
                 <input type="text" name="user_name" placeholder="Enter name...">
                 <button type="submit">Assign</button>
              </form>
            </td>
          </tr>
         </table>
       </div>
       <div class="card-action">
         @if (!($todo->completed))
         <form action="{{route('todos.set_completed', $todo->id)}}" method="POST">
           @csrf
           <input type="hidden" name="id" value="{{$todo->id}}" />
           <button class="btn" type="submit">@lang('todo.done')</button>
         </form>
         @endif
       </div>
     </div>
   </div>
 </div>
