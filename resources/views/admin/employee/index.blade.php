@include('admin.includes.header')

<main id="main" class="main">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{route('admin.insert.employe')}}" class="btn btn-black" href="">
                                <i class="fas fa-plus"></i>
                            Add Employee
                       </a>
                </div>
            </div>
        </div>
    </div>


    
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                       
                                        
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($employes as $item)

                                      
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$item['first_name']}}</td>
                                        <td>{{$item['last_name']}}</td>
                                        <td>{{$item['email']}}</td>
                                        
                                  
                                        <td>{{$item['phone']}}</td>
                                      
                                        <td>
                                           
                                        <div>

                                            <img src="{{asset('storage/'.$item['image'])}}" alt="" width="50px" height="50px">

                                        </div>
                                        </td>

                                        


                                        <td>
                                           
                                            {{date('d-m-Y', strtotime($item['created_at']))}}
                                            
                                        
                                        </td>

                                        <td>{{$item['birthday']}}</td>
                                        <td>
                                            <a href="{{route('admin.edit.employe',$item['id'])}}" class="btn btn-black">Edit</a>
                                            <a href="{{route('admin.delete.employe',$item['id'])}}" class="btn btn-danger">Delete</a>
                                        </td>     


                                    </tr>
                                    
                                    @endforeach


                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
          



 </div>
 
  </main>
       

@include('admin.includes.footer')

