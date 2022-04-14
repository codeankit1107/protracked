@include('admin.includes.header')



<main id="main" class="main">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee Insert</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Employee Insert</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-responsive">


                                    <form action="/employees/{{ $employee->employee_id }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        {{method_field('PUT')}}

                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fa fa-table" aria-hidden="true"></i> Employee
                                                    </div>


                                                    <div class="card-body">
                                                        <div class="needs-validation">


                                                            <div class="form-group row">


                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        First NAME
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="text" name="first_name" value="{{ $employee->first_name }}"
                                                                        class="form-control" required="">
                                                                </div>


                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        Last NAME
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="text" name="last_name" value="{{ $employee->last_name }}"
                                                                        class="form-control" required="">
                                                                </div>





                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        EMAIL
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="email" name="email" value="{{ $employee->email }}"
                                                                        class="form-control" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Phone<span class="star">*</span>
                                                                    </label>
                                                                    <input type="tel" name="phone_number" value="{{ $employee->phone_number }}"
                                                                        class="form-control" required="">
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Select Company <span
                                                                            class="star">*</span>
                                                                    </label>

                                                                    <select class="form-control" name="company_id"
                                                                        required>
                                                                       
                                                                        @foreach ($companies as $company)
                                                                            <option value="{{ $company->company_id }}">
                                                                                {{ $company->company_name }}</option>
                                                                        @endforeach

                                                                    </select>



                                                                </div>






                                                            </div>


                                                            <div class="form-group row mt-4">
                                                                <div class="col-sm-12">
                                                                    <button class="btn btn-primary " type="submit">
                                                                      Update Employee Data</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>


@include('admin.includes.footer')


