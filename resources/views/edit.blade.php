@extends('layouts.app')
  @section('content')
  <div class="wrapper ">
   
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Edit Ticket for {{ $editticket['name']}} </a>
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
                    @isset($users)
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
                      @endisset
      
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
              <form action="{{ url('/updatetiket')}}" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" id="user_id"  />
                <input type="hidden" name="name" id="user"  />
                <input type="hidden" name="ticket_id" value="{{ $editticket['id'] }}"  />
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Title</label>
                      <input type="text" class="form-control" name="title" value="{{ ($editticket['title'])? $editticket['title'] : '' }}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="bmd-label-floating"></label>
                      <input type="date" class="form-control" name="date" value="{{ ($editticket['date'])? $editticket['date'] : '' }}">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" style="margin:0">
                    <label class="bmd-label-floating"></label>
                      <select class="form-control" name="priority" value="{{ ($editticket['priority'])? $editticket['priority'] : '' }}">
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
                      <input type="text" class="form-control" name="desc1" value="{{ ($editticket['desc1'])? $editticket['desc1'] : '' }}">
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
          var ticket_id = $(this).data('');

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


