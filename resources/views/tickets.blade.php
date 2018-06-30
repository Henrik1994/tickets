@extends('layouts.app')
  @section('content')
  <div class="wrapper ">
   
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Add Tickets</a>
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
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
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
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                <form class="navbar-form">
                  <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                    @foreach($users as $user)
                   
                      <tr>
                        <td>
                          <?php if(isset($user['profile']['image'])) {?>
                              <img  src="{{ asset('/img/'. $user['profile']['image'])}}" class="rounded-circle" width="30px" />
                            <?php }else { ?>
                              <img src="{{ asset('/img/faces/marc.jpg')}}" class="rounded-circle" width="30px" > 
                            <?php } ?>
                            
                        </td>
                        <td style="width:100%"><a href="#" class="user">{{ $user['name'] }}</a></td>
                        <td class="td-actions text-right pull-right">
                          <button type="button" rel="tooltip" title="Add Task" data-id = "{{ $user['id'] }}" data-name = "{{ $user['name'] }}"  class="btn btn-primary btn-link btn-sm plus">
                            <i class=" material-icons" style="font-size:24px">add</i>
                          </button>
                        </td>
                      </tr>
                      @endforeach
      
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" tit/usr/share/phpmyadmin/libraries/sql.lib.phple="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>/usr/share/phpmyadmin/libraries/sql.lib.php
                          </button>/usr/share/phpmyadmin/libraries/sql.lib.php
                          <button type="button" rel="tooltip" tit/usr/share/phpmyadmin/libraries/sql.lib.phple="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add New Ticket</h4>
              <div class="col-sm-12">
                <div class="row">
                 
            <!-- STEX ER CHIPY --> 
                
                </div>
              </div>
        
             
            </div>
            <div class="card-body">


              <form action="{{ url('/addticket')}}" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="user_id" id="user_id"  />
              <input type="hidden" name="name" id="user"  />
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Title</label>
                      <input type="text" class="form-control" name="title">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="bmd-label-floating"></label>
                      <input type="date" class="form-control" name="date">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" style="margin:0">
                    <label class="bmd-label-floating"></label>
                      <select class="form-control" name="priority">
                          <option>Hard</option>
                          <option>Medium</option>
                          <option>Easy</option>
                      </select>
                    </div>
                  </div>
                </div>
              
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description 1</label>
                      <input type="text" class="form-control" name="desc1">
                    </div>
                  </div>
                </div>
              
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description 2</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" name="desc2"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                      <label for="file">Choose file to upload</label>
                          <input type="file" id="file" name="file" multiple />
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Save</button>
                <div class="clearfix"></div>
              </form>
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

    <script>
    var asd = "this.parentElement.style.display='none'";

      $('.plus').on('click', function(event){
          var res = $(this).closest('tr').find('.user').text();

          var user_id = $(this).data('id');

          if($('#user').val()){
                var performer = $('#user').val() +',';
                $('#user').val( performer+ $(event.target.parentNode).attr('data-name'))
            }else {
                $('#user').val($(event.target.parentNode).attr('data-name'))
            }



         if($('#user_id').val()){
                var performer2 = $('#user_id').val();
                
             $('#user_id').val( performer2 + ',' + $(event.target.parentNode).attr('data-id'))
            }else {
                $('#user_id').val($(event.target.parentNode).attr('data-id'))
            }


          $('.col-sm-12').children('.row').append(
             ' <div class="chip" style="margin-left: 1%;"> <p class="card-category" style="cursor:pointer">' + res + ' ' +
             '<span class="closebtn" >&times;</span>  </div> ')
      });
  

  
    </script>

@endsection


