@extends('layouts.app')
  @section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="wrapper ">
   
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Inbox</a>
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
        <!-- Nav tabs -->
        <ul class="nav " role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Witing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Done</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3">Closed</a>
          </li>
        </ul>

        </div>
        </div>
          <div class="row">
            <div class="col-sm-4">
             
  <!-- Tab panes -->
  <div class="tab-content">
          <div id="home" class="container tab-pane active">
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
                      <table class="table table-hover">
                        <tbody>
                        @if($tickets)
                        @foreach($tickets as $ticket)
                          <tr>
                            <td class="mytd" data-id="{{ $ticket['id'] }}" data-title="{{ $ticket['title'] }}" data-desc1="{{ $ticket['desc1'] }}" data-user="{{ $ticket['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ $ticket['title'] }}</a></p>
                              <p style="margin:0">{{ $ticket['desc1']}}</p>
                              <p style="margin:0">{{ $ticket['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:blue; font-size:16px;margin-right: 4px">alarm</i>{{ $ticket['date'] }}</p>
                              <?php if($ticket['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $ticket['priority'] }}</p><br>
                              <?php }else if($ticket['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $ticket['priority'] }}</p><br>
                              <?php }else if($ticket['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $ticket['priority'] }}</p><br>
                              <?php } ?>

                              <p style="margin:0;cursor:pointer" class="pull-right closed"
                                data-ticket="{{ $ticket['id'] }}" data-user="{{ $ticket['user_id'] }}"
                                data-title="{{ $ticket['title'] }}" data-desc1="{{ $ticket['desc1'] }}"
                                data-creator="{{ $ticket['creator_id'] }}" data-creatorname="{{ $ticket['creator_name'] }}" 
                                data-name="{{ $ticket['name'] }}" data-date="{{ $ticket['date'] }}" data-desc2="{{ $ticket['desc2'] }}"  
                                data-priority="{{ $ticket['priority'] }}" data-file="{{ $ticket['file'] }}"> 
                                 <i class="material-icons" style="color:red">highlight_off</i>
                              </p>

                              <p style="margin:0;cursor:pointer" class="pull-right witing" 
                                data-ticket="{{ $ticket['id'] }}" data-user="{{ $ticket['user_id'] }}"
                                data-title="{{ $ticket['title'] }}" data-desc1="{{ $ticket['desc1'] }}"
                                data-creator="{{ $ticket['creator_id'] }}" data-creatorname="{{ $ticket['creator_name'] }}" 
                                data-name="{{ $ticket['name'] }}" data-date="{{ $ticket['date'] }}" data-desc2="{{ $ticket['desc2'] }}"  
                                data-priority="{{ $ticket['priority'] }}" data-file="{{ $ticket['file'] }}"> 
                                <i class="material-icons" style="color:blue">history</i>
                              </p>

                              <p style="margin:0;cursor:pointer" class="pull-right done"
                                data-ticket="{{ $ticket['id'] }}" data-user="{{ $ticket['user_id'] }}"
                                data-title="{{ $ticket['title'] }}" data-desc1="{{ $ticket['desc1'] }}"
                                data-creator="{{ $ticket['creator_id'] }}" data-creatorname="{{ $ticket['creator_name'] }}" 
                                data-name="{{ $ticket['name'] }}" data-date="{{ $ticket['date'] }}" data-desc2="{{ $ticket['desc2'] }}"  
                                data-priority="{{ $ticket['priority'] }}" data-file="{{ $ticket['file'] }}" >
                               <i class="material-icons" style="color:green">check_circle</i>
                              </p>
                            
                            </td>
                          </tr>
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="menu1" class="container tab-pane fade">
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
                      <table class="table table-hover">
                        <tbody>
                        @if($witings)
                         @foreach($witings as $witing)
                         <tr>
                            <td class="mytdwiting" data-id="{{ $witing['id'] }}" data-title="{{ $witing['title'] }}" data-desc1="{{ $witing['desc1'] }}" data-user="{{ $witing['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ $witing['title'] }}</a></p>
                              <p style="margin:0">{{ $witing['desc1']}}</p>
                              <p style="margin:0">{{ $witing['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:blue; font-size:16px;margin-right: 4px">alarm</i>{{ $witing['date'] }}</p>
                              <?php if($witing['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php }else if($witing['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php }else if($witing['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php } ?>

                              <p style="margin:0;cursor:pointer" class="pull-right"> 
                                 <i class="material-icons" style="color:red">highlight_off</i>
                              </p>

                              <p style="margin:0;cursor:pointer" class="pull-right done"
                                data-ticket="{{ $witing['id'] }}" data-user="{{ $witing['user_id'] }}"
                                data-title="{{ $witing['title'] }}" data-desc1="{{ $witing['desc1'] }}"
                                data-creator="{{ $witing['creator_id'] }}" data-creatorname="{{ $witing['creator_name'] }}" 
                                data-name="{{ $witing['name'] }}" data-date="{{ $witing['date'] }}" data-desc2="{{ $witing['desc2'] }}"  
                                data-priority="{{ $witing['priority'] }}" data-file="{{ $witing['file'] }}" >
                               <i class="material-icons" style="color:green">check_circle</i>
                              </p>
                            
                            </td>
                          </tr>
                         @endforeach
                         @endif
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="menu2" class="container tab-pane fade">
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
                      <table class="table table-hover">
                        <tbody>
                        @if($dones)
                        @foreach($dones as $done)
                        <tr>
                            <td class="mytdone" data-id="{{ $done['id'] }}" data-title="{{ $done['title'] }}" data-desc1="{{ $done['desc1'] }}" data-user="{{ $done['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ $done['title'] }}</a></p>
                              <p style="margin:0">{{ $done['desc1']}}</p>
                              <p style="margin:0">{{ $done['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:green; font-size:16px;margin-right: 4px">alarm_on</i>{{ $done['date'] }}</p>
                              <?php if($done['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php }else if($done['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php }else if($done['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php } ?>

         
                              <!-- <p> {{ Date($done['created_at']) }}</p> -->
                          

                              <p style="margin:0;cursor:pointer" class="pull-right done form-inline">
                               <i class="material-icons" style="color:green;margin-right: 4px;font-size:18px">check_circle</i>
                               2018-06-27
                              </p>
                         
                            
                            </td>
                          </tr>
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                 
                  </div>
                </div>
              </div>
          </div>
          <div id="menu3" class="container tab-pane fade">
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
                      <table class="table table-hover">
                        <tbody>
                        @if($closeds)
                        @foreach($closeds as $closed)
                          <tr>
                            <td class="mytdclosed" data-id="{{ $closed['id'] }}" data-title="{{ $closed['title'] }}" data-desc1="{{ $closed['desc1'] }}" data-user="{{ $closed['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ $closed['title'] }}</a></p>
                              <p style="margin:0">{{ $closed['desc1']}}</p>
                              <p style="margin:0">{{ $closed['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">alarm_off</i>{{ $closed['date'] }}</p>
                              <?php if($closed['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php }else if($closed['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php }else if($closed['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php } ?>


                              <p style="margin:0;cursor:pointer" class="pull-right witing" 
                                data-ticket="{{ $closed['id'] }}" data-user="{{ $closed['user_id'] }}"
                                data-title="{{ $closed['title'] }}" data-desc1="{{ $closed['desc1'] }}"
                                data-creator="{{ $closed['creator_id'] }}" data-creatorname="{{ $closed['creator_name'] }}" 
                                data-name="{{ $closed['name'] }}" data-date="{{ $closed['date'] }}" data-desc2="{{ $closed['desc2'] }}"  
                                data-priority="{{ $closed['priority'] }}" data-file="{{ $closed['file'] }}"> 
                                <i class="material-icons" style="color:blue">history</i>
                              </p>

                              <p style="margin:0;cursor:pointer" class="pull-right done"
                                data-ticket="{{ $closed['id'] }}" data-user="{{ $closed['user_id'] }}"
                                data-title="{{ $closed['title'] }}" data-desc1="{{ $closed['desc1'] }}"
                                data-creator="{{ $closed['creator_id'] }}" data-creatorname="{{ $closed['creator_name'] }}" 
                                data-name="{{ $closed['name'] }}" data-date="{{ $closed['date'] }}" data-desc2="{{ $closed['desc2'] }}"  
                                data-priority="{{ $closed['priority'] }}" data-file="{{ $closed['file'] }}" >
                               <i class="material-icons" style="color:green">check_circle</i>
                              </p>
                            
                            </td>
                          </tr>
                        @endforeach
                        @endif
                         
                        </tbody>
                      </table>
                    </div>
                 
                  </div>
                </div>
              </div>
          </div>
        </div>
            </div>
            <div class="col-sm-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title imtitle" >Title</h4>
                </div>
                <div class="card-body">
                 
                  <div class="row">
                      <div class="col-sm-12">
                      <div class="form-group">
                        <h4 class="imdesc1">Description</h4>
                        </div>
                     </div>
                    </div>
                  <div class="row" style="background-color: #eceeef;margin:0">
                  <div class="col-sm-4" > 
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                      <div class="card-body">
                        <p class="card-text" style="font-size:15px">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                          <hr style="margin:0"/>
                          <p class="text-right" style="margin-right: 10%;margin-bottom: 2% ">29/04/1994  15:30</p>
                    </div>
                  </div>
                  </div>
                  <form action="{{ url('/addcomment')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <input type="hidden" name="ticket_id" id="ticket_id" value="">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Comment</label>
                            <input type="text" class="form-control" name="comment">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">Send</button>
                      <div class="clearfix">
                    </div>
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
        var title = $('.mytd').data('title');
        var desc1 = $('.mytd').data('desc1');

          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);

         $('.mytd').click(function(){
          var ticket_id = $(this).data('id');
          var user_id = $(this).data('user');
          var title = $(this).data('title');
          var desc1 = $(this).data('desc1');

          $('#ticket_id').val(ticket_id);
          $('#user_id').val(user_id);
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);
          
          
        });
        $('.mytdone').click(function(){
          var ticket_id = $(this).data('id');
          var user_id = $(this).data('user');
          var title = $(this).data('title');
          var desc1 = $(this).data('desc1');

          $('#ticket_id').val(ticket_id);
          $('#user_id').val(user_id);
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);
          
          
        });
        $('.mytdwiting').click(function(){
          var ticket_id = $(this).data('id');
          var user_id = $(this).data('user');
          var title = $(this).data('title');
          var desc1 = $(this).data('desc1');

          $('#ticket_id').val(ticket_id);
          $('#user_id').val(user_id);
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);
          
          
        });
        $('.mytdclosed').click(function(){
          var ticket_id = $(this).data('id');
          var user_id = $(this).data('user');
          var title = $(this).data('title');
          var desc1 = $(this).data('desc1');

          $('#ticket_id').val(ticket_id);
          $('#user_id').val(user_id);
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);
          
          
        });

           $('.done').click(function(){
            var ticket_id = $(this).data('ticket');
            var user_id = $(this).data('user');
            var creator_id = $(this).data('creator');
            var creator_name = $(this).data('creatorname');
            var name = $(this).data('name'); 
            var title = $(this).data('title');
            var date = $(this).data('date'); 
            var priority = $(this).data('priority'); 
            var desc1 = $(this).data('desc1');
            var desc2 = $(this).data('desc2');
            var file = $(this).data('file'); 
            
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/done',
                    type: 'POST',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id, creator_id: creator_id, creator_name: creator_name, name: name, title: title, date: date, priority: priority, desc1: desc1, desc2: desc2, file: file  },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) { 
                      demo.showNotification('top','center',)
                      setTimeout(() => {
                        window.location.assign('/inbox');
                      }, 2000);
                    }
                }); 
          });

          $('.witing').click(function(){
            var ticket_id = $(this).data('ticket');
            var user_id = $(this).data('user');
            var creator_id = $(this).data('creator');
            var creator_name = $(this).data('creatorname');
            var name = $(this).data('name'); 
            var title = $(this).data('title');
            var date = $(this).data('date'); 
            var priority = $(this).data('priority'); 
            var desc1 = $(this).data('desc1');
            var desc2 = $(this).data('desc2');
            var file = $(this).data('file');
            
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/witing',
                    type: 'POST',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id, creator_id: creator_id, creator_name: creator_name, name: name, title: title, date: date, priority: priority, desc1: desc1, desc2: desc2, file: file  },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) { 
                      demo.showNotification('top','center',)
                      setTimeout(() => {
                        window.location.assign('/inbox');
                      }, 2000);
                    }
                }); 
          });    
          $('.closed').click(function(){
            var ticket_id = $(this).data('ticket');
            var user_id = $(this).data('user');
            var creator_id = $(this).data('creator');
            var creator_name = $(this).data('creatorname');
            var name = $(this).data('name'); 
            var title = $(this).data('title');
            var date = $(this).data('date'); 
            var priority = $(this).data('priority'); 
            var desc1 = $(this).data('desc1');
            var desc2 = $(this).data('desc2');
            var file = $(this).data('file');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/closed',
                    type: 'POST',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id, creator_id: creator_id, creator_name: creator_name, name: name, title: title, date: date, priority: priority, desc1: desc1, desc2: desc2, file: file  },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) { 
                      demo.showNotification('top','center',)
                      setTimeout(() => {
                        window.location.assign('/inbox');
                      }, 2000);
                    }
                }); 
          });     

     </script>

@endsection
