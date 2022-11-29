<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="SimpingTech" />
    <meta name="author" content="SimpingTech" />

    <title>Authentication - SimpingTech</title>

    <link href="toruskit/dist/css/toruskit.bundle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm mr-auto">
        <div class="container">
            <a class="navbar-brand" href="index.php">ThePriceFinder</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Back to Home</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                
                    <div id="panelLogin" class="">
                        <div class="card mx-auto my-4">
                            <div class="card-header">
                                <h4 class="card-title">Log In</h4>
                            </div>
                        <form id="formLogin" action="javascript:void(0);" method="post">
                            <div class="card-body">
                                <div class="alert alert-success animate__animated d-none" id="loginSuccess">
                                    Logging in... Click <a href="index.php">here</a> if you're not redirected!
                                </div>
                                <div class="alert alert-danger animate__animated d-none" id="loginFailed">
                                    Incorrect login credentials!
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-text" id="svgUname">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </div>
                                    <input class="form-control" type="text" id="loginUname" name="loginUname"
                                        placeholder="Enter username..." required />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-text" id="svgPword">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-key" viewBox="0 0 16 16">
                                            <path
                                                d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                    <input class="form-control" type="password" id="loginPword" name="loginPword"
                                        placeholder="Enter password..." required />
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-toolbar justify-content-between">
                                    <div class="button-group" role="button">
                                        <input type="submit" class="btn btn-primary btn-block" id="btnloginLogin" value="Log In" />
                                    </div>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-outline-success btn-block" id="btnloginReg" value="Register" >Register <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                          </svg></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div id="panelReg" class="d-none">
                    <div class="card mx-auto my-4">
                        <div class="card-header">
                            <h4 class="card-title">Register</h4>
                        </div>
                        <form id="formReg" action="javascript:void(0);" method="post">
                            <div class="card-body">
                                <div class="alert alert-success animate__animated d-none" id="regSuccess">
                                    Successful! Click <a href="auth.php">here</a> to log in!
                                </div>
                                <div class="alert alert-danger animate__animated d-none" id="regExist">
                                    Account already exist!
                                </div>
                                <div class="alert alert-danger animate__animated d-none" id="regFailed">
                                    Error creating your account! Reload this page or contact
                                    website administrator!
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-text" id="svgUname">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </div>
                                    <input class="form-control" type="text" id="regUname" name="regUname"
                                        placeholder="Enter username..." required />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-text" id="svgPword">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-key" viewBox="0 0 16 16">
                                            <path
                                                d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                    <input class="form-control" type="password" id="regPword" name="regPword"
                                        placeholder="Enter password..." required />
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-toolbar justify-content-between">
                                    <div class="button-group" role="button">
                                        <button type="button" class="btn btn-outline-success btn-block" id="btnregLogin"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                            </svg> Log In
                                        </button>
                                    </div>
                                    <div class="button-group">
                                        <input type="submit" class="btn btn-primary btn-block" id="btnregReg"
                                            value="Register" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.11.3/dist/gsap.min.js"></script>
    <script src="auth.js"></script>
</body>

</html>