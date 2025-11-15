@extends('layouts.dashboard')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
            
<div class="page-heading">
    <h3>Departments Page</h3>
</div> 

<div id="main w-full">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>   
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DepartmentTable</h3>
                <p class="text-subtitle text-muted">Handle Departmkents</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Department</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Department</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Department
                </h5>
            </div>
            <div class="card-body">

                <form action="{{ route('departments.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="d-flex">
                                <a href="{{ route('departments.index') }}" class="btn btn-primary mb-3 ms-auto">Back to list</a>
                            </div>
                        <div class="card-header">
                            <h4 class="card-title">Department Inputs</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="helperText"><h6>Department Name</h6></label>
                                        <input type="text" id="helperText" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Status</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="status">
                                                <option value="Active">Active</option>
                                                <option value="Innactive">Innactive</option>
                                            </select>
                                        </fieldset>
                                        @error('status')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <h6>
                                        Description
                                    </h6>
                                    <div class="form-group with-title">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') }}</textarea>
                                        <label>Departments Explanation</label>
                                        @error('description')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-md w-[200px]">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                    by <a href="https://saugi.me">Saugi</a></p>
            </div>
        </div>
    </footer>
</div>

@endsection

