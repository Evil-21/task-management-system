@extends('layouts.base')

@section('title', 'Edit Task')

@section('content')
<div class="container">
<div class="create-task d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="text-center py-3">Task Management</h1>
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" class="row g-3 " method="POST">
        @csrf
        @method('PUT')
       <div class="col-12 mb-3">
          <label for="validationCustom01" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="validationCustom01" value="{{ $task->title }}" >
          @error('title')
          <div class="text-danger">
            {{ $message }}
          </div>
          @enderror
       </div>
       <div class="col-12 mb-3">
          <label for="validationTextarea" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="validationTextarea">{{ $task->description }}</textarea>
          @error('description')
          <div class="intext-danger">
            {{ $message }}
          </div>
          @enderror
       </div>
       <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Update</button>
       </div>
    </form>
 </div>
</div>
@endsection