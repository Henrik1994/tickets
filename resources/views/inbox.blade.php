@extends('layouts.app')
  @section('content')
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
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
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
        <ul class="nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Waiting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Done</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Closed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">All</a>
              </li>
            </ul>
        </div>
        </div>
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
                          <tr>
                            <td>
                              <p style="margin:0"><a href="#">Title</a></p>
                              <p style="margin:0">Description</p>
                              <p style="margin:0">from</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">alarm_off</i>    20/06/2018</p>
                              <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">lens</i>Hard</p><br>
                              <p style="margin:0" class="pull-right"> <i class="material-icons" style="color:green">check_circle</i></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p style="margin:0"><a href="#">Title</a></p>
                              <p style="margin:0">Description</p>
                              <p style="margin:0">from</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">alarm_on</i>    20/06/2018</p>
                              <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">lens</i>Hard</p><br>
                              <p style="margin:0" class="pull-right"> <i class="material-icons" style="color:green">check_circle</i></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p style="margin:0"><a href="#">Title</a></p>
                              <p style="margin:0">Description</p>
                              <p style="margin:0">from</p>
                            </td>
                            <td class="pull-right">
                              <p style="margin:0" class="form-inline"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">alarm</i>    20/06/2018</p>
                              <p style="margin:0; color:red" class="form-inline pull-right"><i class="material-icons" style="color:red; font-size:16px;margin-right: 4px">lens</i>Hard</p><br>
                              <p style="margin:0" class="pull-right"> <i class="material-icons" style="color:green">check_circle</i></p>
                            </td>
                          </tr>
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
                  <h4 class="card-title">Title</h4>
                </div>
                <div class="card-body">
                  <form>
                  <div class="row">
                      <div class="col-sm-12">
                      <div class="form-group">
                        <h4 >Description</h4>
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
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comment</label>
                          <input type="text" class="form-control">
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
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection
