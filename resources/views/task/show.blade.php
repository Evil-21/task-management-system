@extends('layouts.base')
@section('title', 'View Task')
@section('content')
<div class="container mt-5">
    <h1 class="text-center py-3">Task Details</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
    <div class="item-details">
       <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-lg-11"></div>
                <div class="col-lg-1">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="statusSwitch">Status</label>
                            <input class="form-check-input" type="checkbox" id="statusSwitch" {{ $task->is_completed ? 'checked' : '' }} onclick="changeStatus()">
                        </div>
                </div>
            </div>
             <h5 class="card-title">{{ $task->title }}</h5>
             <h6 class="card-subtitle mb-2 text-body-secondary">Created At: {{ date('Y-m-d', strtotime($task->created_at)) }}</h6>
             <p class="card-text">{{ $task->description }}</p>
             <div class="d-flex">
                <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="card-link btn btn-success me-2">Update</a>
                <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="card-link btn btn-danger">Delete</button>
                </form>
            </div>
           
            </div>
          </div>
       </div>
    </div>

 </div>
@endsection

@push('script-footer')
    <script>
        function changeStatus() {
            axios.get("{{ route('tasks.changeStatus', ['id' => $task->id]) }}")
                .then(response => {
                    if (response.data.task.is_completed == true) {
                        alertify.set('notifier','position', 'top-right');
                    alertify.success('Task Completed successfully');
                    } else {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error('Task has been marked incomplete');
                    }
                })
                .catch(error => {
                    alertify.set('notifier','position', 'top-right');
                    alertify.error('Something went wrong');
                });
        }
    </script>
@endpush