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


                                    <form id="form">
                                        @csrf

                                        <input type="hidden" name="ids" value="">
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
                                                                    <input type="text" name="first_name" value=""
                                                                        class="form-control" required="">
                                                                </div>


                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        Last NAME
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="text" name="last_name" value=""
                                                                        class="form-control" required="">
                                                                </div>





                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        EMAIL
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="email" name="email" value=""
                                                                        class="form-control" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Phone<span class="star">*</span>
                                                                    </label>
                                                                    <input type="tel" name="phone_number" value=""
                                                                        class="form-control" required="">
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Select Company <span
                                                                            class="star">*</span>
                                                                    </label>

                                                                    <select class="form-control" name="company_id"
                                                                        required="">
                                                                        <option value="">Select Company</option>
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
                                                                       Add Employee </button>
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


<script>
    $("#image-target").on('click', function() {
        $("#form input[name=company_logo]").trigger('click');

    });
    $("#form input[name=company_logo]").on('change', function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            console.log(reader.result);
            $('#image-target').attr('src', reader.result);
        }
        reader.readAsDataURL(this.files[0]);
    });




    $("#form").submit(function() {
        event.preventDefault();
        axios.post("{{ route('employees.store') }}", new FormData($("#form")[0])).then(response => {
            console.log(response);
            var data = response.data;
            if (data.success) notify(null, 'Employee added successfully', 'top right', 'success', true,
                "{{ route('employees.index') }}", 1000);
            else {
                for (var a in data['error']['message']) {
                    console.log(a);
                    if (a == 'description') notify('#form textarea[name=' + a + ']', data['error'][
                        'message'
                    ][a][0], 'botton left');
                    else notify('#form input[name=' + a + ']', data['error']['message'][a][0],
                        'botton left');
                }
            }
        }).catch(error => {
            console.log(error);
        });
    });
</script>
