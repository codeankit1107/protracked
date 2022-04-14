@include('admin.includes.header')



<main id="main" class="main">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Company Insert</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Company Insert</li>
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
                                                        <i class="fa fa-table" aria-hidden="true"></i> Company
                                                    </div>


                                                    <div class="card-body">
                                                        <div class="needs-validation">


                                                            <div class="form-group row">

                                                               
                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        NAME
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="text" name="company_name" value=""
                                                                        class="form-control" required="">
                                                                </div>





                                                               
                                                                <div class="col-sm-6">

                                                                    <label class="col-sm-12 col-form-label">
                                                                        EMAIL
                                                                        <span class="star">*</span>
                                                                    </label>
                                                                    <input type="email" name="company_email" value=""
                                                                        class="form-control" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Website<span class="star">*</span>
                                                                    </label>
                                                                    <input type="tel" name="company_website" value=""
                                                                        class="form-control" required="">
                                                                </div>


                                                                <div class="col-sm-6">
                                                                    <label class="col-sm-12 col-form-label">
                                                                        Company Logo <span
                                                                            class="star">*</span>
                                                                    </label>
                                                                    <img id="image-target"
                                                                        src="{{ asset('no_image.png') }}"
                                                                        style="height:100px;width:150px;cursor:pointer;">
                                                                    <small id="name" class="form-text text-muted">
                                                                        Click on image to select/change image.
                                                                    </small>
                                                                    <input name="company_logo" type="file" style="display:none"
                                                                        class="form-control">


                                                                </div>







                                                            </div>


                                                            <div class="form-group row mt-4">
                                                                <div class="col-sm-12">
                                                                    <button class="btn btn-primary submitbtnnk "
                                                                        type="submit"> Submit </button>
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
        axios.post("{{ route('companies.store') }}", new FormData($("#form")[0])).then(response => {
            console.log(response);
            var data = response.data;
            if (data.success) notify(null, 'Company added successfully', 'top right', 'success', true,
                "{{ route('companies.index') }}", 1000);
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
