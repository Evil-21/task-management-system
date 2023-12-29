@extends('layouts.base')

@section('title', 'Create Task')

@section('content')
<div class="container">
<div class="create-task d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="text-center py-3">Task Management</h1>
    <form action="{{ route('tasks.store') }}" class="row g-3 " method="POST">
        @csrf
       <div class="col-12 mb-3">
          <label for="validationCustom01" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="validationCustom01" placeholder="Enter Task Name" >
          @error('title')
          <div class="text-danger">
            {{ $message }}
          </div>
          @enderror
       </div>
       <div class="col-12 mb-3">
          <label for="validationTextarea" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="validationTextarea" placeholder="Add Description" ></textarea>
          @error('description')
          <div class="intext-danger">
            {{ $message }}
          </div>
          @enderror
       </div>
       <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Add</button>
       </div>
    </form>
 </div>
</div>
@endsection