@include('admin.includes.header')

<main id="main" class="main">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Companies </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Companies</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{route('companies.create')}}" class="btn btn-primary" href="">
                                <i class="fas fa-plus"></i>
                           Create New Company
                       </a>
                </div>
            </div>
        </div>
    </div>


    
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
          
                <div class="tab-content py-3 px-3 px-sm-0 nkcontent" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive">
                            <table class="table dash_list" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th> Name</th>
                                        
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($companies as $item)

                                      
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$item['company_name']}}</td>
                                       
                                        <td>{{$item['company_email']}}</td>
                                        
                                  
                                     
                                        <td>
                                           
                                        <div>

                                            <img src="{{asset('storage/'.$item['company_logo'])}}" alt="" width="50px" height="50px">

                                        </div>
                                        </td>

                                        <td>

                                            <a href="{{$item['company_website']}}" target="_blank">{{$item['company_website']}}</a>

                                        </td>

                                        



                                      
                                        <td>
                                            <a href="{{route('companies.edit',$item['company_id'])}}" class="btn btn-success">Edit</a>
                                            
                                            <form action="{{route('companies.destroy',$item['company_id'])}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>


                                        </td>     


                                    </tr>
                                    
                                    @endforeach


                                  
                                </tbody>
                            </table>

                            {{ $companies->links() }}
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
          



 </div>
 
  </main>
       

@include('admin.includes.footer')

