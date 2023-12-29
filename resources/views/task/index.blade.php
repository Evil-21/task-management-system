@extends('layouts.base')

@section('content')
<div class="container mt-5">
   <div class="view-task">
      <h1 class="text-center py-3">Task List</h1>

      <div class="text-center mb-3">
         <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
      </div>
      
      <table class="table table-bordered" id="taskTable">
         <thead>
            <tr>
               <th>
                  <div class="d-flex justify-content-center">
                     Task Title
                  </div>
               </th>
               <th>
                  <div class="d-flex justify-content-center">
                  Created At
               </th>
            </div>
               <th>
                  <div class="d-flex justify-content-center">
                     Status
                  </th>
               </div>
               <th>
                  <div class="d-flex justify-content-center">
                     Action
                  </th>
               </div>
            </tr>
         </thead>
         <tbody>
            @forelse ($tasks as $task)    
            <tr>
               <td>
                  <div class="d-flex justify-content-center">
                  {{ $task->title }}</td>
                  </div>
               <td>
                  <div class="d-flex justify-content-center">
                     {{ date('Y-m-d', strtotime($task->created_at)) }}
                  </div>
               </td>
               <td>
                  <div class="d-flex justify-content-center">
                     <p>{{$task->is_completed ? 'Completed' : 'Not Completed'}}</p>
                  </div>
               </td>
               <td>
                  <div class="d-flex justify-content-center">
                  <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="btn btn-sm btn-success">View</a>
                  </div>
               </td>
            </tr>
            @empty
                <p>No task found</p>
            @endforelse
         </tbody>
      </table>
   </div>
</div>
@endsection

@push('script-footer')
<script>
   $(document).ready(function () {
       $('#taskTable').DataTable();
   });
</script>

@endpush