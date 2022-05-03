<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ghostwriting - Dashboard</title>

    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('css')

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('add-news')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>News</span>
                </a>
            </li>
             <hr class="sidebar-divider">
            <div class="sidebar-heading">
                USERS
            </div>           
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('freelancer-list')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Freelancer</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Orders
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-orders')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Requested Orders</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('pending-payments')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pending Payments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('in-progress-orders')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Orders In Progress</span>
                </a>
            </li>
            <div class="sidebar-heading">
                PRICES
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-prices')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Calculator Prices</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            
            <div class="sidebar-heading">
                CONTENT
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-texts')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Texts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-disciplines')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Disciplines & Services</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-tutorials')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tutorials</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-faq')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Faq</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-how-it-works')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>How It Works</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            
            <div class="sidebar-heading">
                OTHER
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-company-details')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Company Details</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <form action="{{route('logout')}}" method='POST' id="logout_form">
                    {{csrf_field()}}
                    <button class="nav-link collapsed bg-transparent border-0" href="{{route('logout')}}">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="my-2">
                        <x-flash-messages/>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @yield('scripts')

    <script type="text/javascript">
       let forms = document.querySelectorAll('form');
       for(let form of forms){
        
        form.addEventListener('submit',function(e){
            if(form.getAttribute('id')=='logout_form'){
                form.submit();
            }
            else{
                e.preventDefault();
                if(confirm('Are you sure?')){
                    form.submit();
                };
            }    
        });
       }
    </script>
</body>

</html>