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
                <div class="card-body" style="height:550px;overflow: auto">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table table-hover">
                        <tbody>
                        @isset($tickets)
                          @foreach($tickets as $ticket)
                            @if($ticket['role'] == 1)
                          <tr>
                            <td class="mytd" data-id="{{ $ticket['id'] }}" data-title="{{ $ticket['title'] }}" data-desc1="{{ $ticket['desc1'] }}" data-user="{{ $ticket['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ (strlen($ticket['title']) < 15 )? $ticket['title'] : substr($ticket['title'],0,15).'..'   }}</a></p>
                              <p style="margin:0">{{ (strlen($ticket['desc1']) < 15 )? $ticket['desc1'] : substr($ticket['desc1'],0,15).'..'  }}</p>
                              <p style="margin:0">{{ $ticket['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline">{{ $ticket['date'] }}</p>
                              <?php if($ticket['priority'] == 'Bicycle') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $ticket['priority'] }}</p><br>
                              <?php }else if($ticket['priority'] == 'Bolt') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $ticket['priority'] }}</p><br>
                              <?php }else if($ticket['priority'] == 'Turtle') { ?>
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
                            @endif
                          @endforeach
                        @endisset
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
                <div class="card-body" style="height:550px;overflow: auto">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table table-hover">
                        <tbody>
                        @isset($tickets)
                         @foreach($tickets as $witing) 
                          @if($witing['role'] == 3)
                         <tr>
                            <td class="mytdwiting" data-id="{{ $witing['id'] }}" data-title="{{ $witing['title'] }}" data-desc1="{{ $witing['desc1'] }}" data-user="{{ $witing['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ (strlen($witing['title']) < 15 )? $witing['title'] : substr($witing['title'],0,15).'..'  }}</a></p>
                              <p style="margin:0">{{ (strlen($witing['desc1']) < 15 )? $witing['desc1'] : substr($witing['desc1'],0,15).'..'  }}</p>
                              <p style="margin:0">{{ $witing['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:blue; font-size:16px;margin-right: 4px">alarm</i>{{ $witing['date'] }}</p>
                              <?php if($witing['priority'] == 'Bicycle') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php }else if($witing['priority'] == 'Bolt') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php }else if($witing['priority'] == 'Turtle') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $witing['priority'] }}</p><br>
                              <?php } ?>

                             
                             <p style="margin:0;cursor:pointer" class="pull-right closed"
                                data-ticket="{{ $witing['id'] }}" data-user="{{ $witing['user_id'] }}"
                                data-title="{{ $witing['title'] }}" data-desc1="{{ $witing['desc1'] }}"
                                data-creator="{{ $witing['creator_id'] }}" data-creatorname="{{ $witing['creator_name'] }}" 
                                data-name="{{ $witing['name'] }}" data-date="{{ $witing['date'] }}" data-desc2="{{ $witing['desc2'] }}"  
                                data-priority="{{ $witing['priority'] }}" data-file="{{ $witing['file'] }}"> 
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
                            @endif
                          @endforeach
                         @endisset
                       
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
                <div class="card-body" style="height:550px;overflow: auto">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table table-hover">
                        <tbody>
                        @isset($tickets)
                          @foreach($tickets as $done)
                            @if($done['role'] == 2 || $done['role'] == 4)
                        <tr>
                            <td class="mytdone" data-id="{{ $done['id'] }}" data-title="{{ $done['title'] }}" data-desc1="{{ $done['desc1'] }}" data-user="{{ $done['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ (strlen($done['title']) < 15 )? $done['title'] : substr($done['title'],0,15).'..'  }}</a></p>
                              <p style="margin:0">{{ (strlen($done['desc1']) < 15 )? $done['desc1'] : substr($done['desc1'],0,15).'..'  }}</p>
                              <p style="margin:0">{{ $done['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                            @if($done['role'] == 2)
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:green; font-size:16px;margin-right: 4px">check_circle</i>{{ $witing['date'] }}</p>
                              @elseif($done['role'] == 4)
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">highlight_off</i>{{ $witing['date'] }}</p>
                              @endif 
                              <?php if($done['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php }else if($done['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php }else if($done['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $done['priority'] }}</p><br>
                              <?php } ?>

                              <p style="margin:0;cursor:pointer" class="pull-right done form-inline">
                              {{ $done['created_at']->format('Y-m-d') }}
                              </p>
                         
                            
                            </td>
                          </tr>
                            @endif
                          @endforeach
                        @endisset
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
                <div class="card-body" style="height:550px;overflow: auto">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table table-hover">
                        <tbody>
                        @isset($tickets)
                          @foreach($tickets as $closed)
                            @if($closed['role'] == 6 || $closed['role'] == 5 )
                          <tr>
                            <td class="mytdclosed" data-id="{{ $closed['id'] }}" data-title="{{ $closed['title'] }}" data-desc1="{{ $closed['desc1'] }}" data-user="{{ $closed['user_id'] }}">
                              <p style="margin:0"><a href="#">{{ (strlen($closed['title']) < 15 )? $closed['title'] : substr($closed['title'],0,15).'..'  }}</a></p>
                              <p style="margin:0">{{ (strlen($closed['desc1']) < 15 )? $closed['desc1'] : substr($closed['desc1'],0,15).'..'  }}</p>
                              <p style="margin:0">{{ $closed['creator_name'] }}</p>
                            </td>
                            <td class="pull-right">
                            @if($closed['role'] == 6)
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:green; font-size:16px;margin-right: 4px">check_circle</i>{{ $closed['date'] }}</p>
                              @elseif($closed['role'] == 5)
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">highlight_off</i>{{ $closed['date'] }}</p>                              @endif 
                              
                             
                              <?php if($closed['priority'] == 'Medium') { ?>
                              <p style="margin:0; color:blue" class="form-inline pull-right"><i class="material-icons" style="color:#1E90FF; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php }else if($closed['priority'] == 'Hard') { ?>
                                <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:#FF4500; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php }else if($closed['priority'] == 'Easy') { ?>
                                <p style="margin:0; color:green" class="form-inline pull-right"><i class="material-icons" style="color:#3CB371; font-size:16px;margin-right: 4px">lens</i>{{ $closed['priority'] }}</p><br>
                              <?php } ?>


                              <p style="margin:0;cursor:pointer" class="pull-right" >
                              {{ $closed['created_at']->format('Y-m-d') }}
                              </p>

                          
                            
                            </td>
                          </tr>
                          @endif
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
                  <div class="row" id="asd" style="background-color: #eceeef;margin:0;height:350px;overflow: auto">
                  <div class="col-sm-12 mycoment"> 
              
                  </div>
                  </div>
                  <form action="{{ url('/addcomment')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
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
        var ticket_id = $('.mytd').data('id');
        var user_id = $('.mytd').data('user');

          $('#ticket_id').val(ticket_id);    
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/getcomment',
                    type: 'GET',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) {
                      $('.mycoment').empty(); 
                      var comments = response.comments.comment; 
                      for(var i = 0; i < comments.length; i++){
                        $('.mycoment').append('<div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text" style="font-size:15px">'+ comments[i].comment +'</p></div> <hr style="margin:0"/> <div class="card-footer" style="padding:0;margin-bottom:5px"> <p class="text-left" style="margin:0" >'+ comments[i].user_id +'</p><p class="text-right" style="margin:0"  >'+ comments[i].created_at +'</p></div> </div>');
                      }
                      $("#asd").scrollTop($("#asd")[0].scrollHeight); 

                    }
                    
                }); 

         $('.mytd').click(function(){
          var ticket_id = $(this).data('id');
          var user_id = $(this).data('user');
          var title = $(this).data('title');
          var desc1 = $(this).data('desc1');

          $('#ticket_id').val(ticket_id);
          $('#user_id').val(user_id);
          $('.imtitle').text(title);
          $('.imdesc1').text(desc1);

                          $.ajax({
                    /* the route pointing to the post function */
                    url: '/getcomment',
                    type: 'GET',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) {
                      $('.mycoment').empty(); 
                      var comments = response.comments.comment;
                      for(var i = 0; i < comments.length; i++){
                        $('.mycoment').append('<div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text" style="font-size:15px">'+ comments[i].comment +'</p></div> <hr style="margin:0"/> <div class="card-footer" style="padding:0;margin-bottom:5px"> <p class="text-left" style="margin:0" >'+ comments[i].user_id +'</p><p class="text-right" style="margin:0"  >'+ comments[i].created_at +'</p></div> </div>');
                      }
                      $("#asd").scrollTop($("#asd")[0].scrollHeight); 

                    }
                    
                }); 
          
          
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

                          $.ajax({
                    /* the route pointing to the post function */
                    url: '/getcomment',
                    type: 'GET',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) {
                      $('.mycoment').empty(); 
                      var comments = response.comments.comment;
                      for(var i = 0; i < comments.length; i++){
                        $('.mycoment').append('<div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text" style="font-size:15px">'+ comments[i].comment +'</p></div> <hr style="margin:0"/> <div class="card-footer" style="padding:0;margin-bottom:5px"> <p class="text-left" style="margin:0" >'+ comments[i].user_id +'</p><p class="text-right" style="margin:0"  >'+ comments[i].created_at +'</p></div> </div>');
                      }
                      $("#asd").scrollTop($("#asd")[0].scrollHeight); 

                    }
                    
                }); 
          
          
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

                          $.ajax({
                    /* the route pointing to the post function */
                    url: '/getcomment',
                    type: 'GET',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) {
                      $('.mycoment').empty(); 
                      var comments = response.comments.comment;
                      for(var i = 0; i < comments.length; i++){
                        $('.mycoment').append('<div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text" style="font-size:15px">'+ comments[i].comment +'</p></div> <hr style="margin:0"/> <div class="card-footer" style="padding:0;margin-bottom:5px"> <p class="text-left" style="margin:0" >'+ comments[i].user_id +'</p><p class="text-right" style="margin:0"  >'+ comments[i].created_at +'</p></div> </div>');
                      }
                      $("#asd").scrollTop($("#asd")[0].scrollHeight); 

                    }
                    
                }); 
          
          
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


                          $.ajax({
                    /* the route pointing to the post function */
                    url: '/getcomment',
                    type: 'GET',
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    /* send the csrf-token and the input to the controller */
                    data: { ticket_id: ticket_id, user_id: user_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (response) {
                      $('.mycoment').empty(); 
                      var comments = response.comments.comment;
                      for(var i = 0; i < comments.length; i++){
                        $('.mycoment').append('<div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text" style="font-size:15px">'+ comments[i].comment +'</p></div> <hr style="margin:0"/> <div class="card-footer" style="padding:0;margin-bottom:5px"> <p class="text-left" style="margin:0" >'+ comments[i].user_id +'</p><p class="text-right" style="margin:0"  >'+ comments[i].created_at +'</p></div> </div>');
                      }
                      $("#asd").scrollTop($("#asd")[0].scrollHeight); 

                    }
                    
                }); 
          
          
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
