@extends('layouts.app')
@section('content')
  <div class="wrapper ">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">email</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  @isset($myticket)
                  <span class="notification">{{ count($myticket) }}</span>
                  @endisset
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @isset($myticket)
                  @foreach($myticket as $ticket)
                     <a class="dropdown-item" href="{{ url('/inbox') }}">{{ $ticket['title'] }}</a>
                  @endforeach
                @endisset
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="person" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  {{ Auth::user()->name }}
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="person">
                  <a class="dropdown-item" href="{{ url('/profile') }}">My  Profile</a>
                  <a class="dropdown-item" href="{{ url('/logout') }}">Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>


                <div class="card-body">
                  <form action="{{ url('/addProfile') }}" method="post" enctype="multipart/form-data" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control" name="firstName" value= "{{ ($user['profile']['firstName'])? $user['profile']['firstName']: '' }}"  required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" name="lastName" value= "{{ ($user['profile']['lastName'])? $user['profile']['lastName']: '' }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" name="adress" value= "{{ ($user['profile']['adress'])? $user['profile']['adress']: '' }}" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label class="btn btn-default">
                            Upload Photo <input type="file" name="image">
                        </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city" value= "{{ ($user['profile']['city'])? $user['profile']['city']: '' }}" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" name="country" value= "{{ ($user['profile']['country'])? $user['profile']['country']: '' }}" required />
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" class="form-control" name="postal" value= "{{ ($user['profile']['postal'])? $user['profile']['postal']: '' }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Write about You</label>
                            <textarea class="form-control" rows="5" name="desc"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-sm-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                  <?php if(isset($user['profile']['image'])) {?>
                    <img class="img" src="{{ asset('/img/'. $user['profile']['image'])}}" />
                  <?php }else { ?>
                    <img class="img" src="{{ asset('/img/faces/marc.jpg')}}" />
                  <?php } ?>
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Developer</h6>
                  <h4 class="card-title">{{ ($user['profile']['firstName'])? $user['profile']['firstName']: '' }} {{ ($user['profile']['lastName'])? $user['profile']['lastName']: '' }} </h4>
                  <p class="card-description">
                  {{ ($user['profile']['desc'])? $user['profile']['desc']: '' }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> 
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection