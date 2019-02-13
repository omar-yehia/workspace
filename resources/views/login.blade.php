<html>
  <head>
<style>
.login-block{
    background: #DE6262;  
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262); 
background: linear-gradient(to bottom, #FFB88C, #DE6262); 
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:560px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
    .registerSec{text-align: center; margin-left: 100px;margin-top: -100px;}
</style>
  </head>

  <body>
    <section class="login-block">
      <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
          <h2 class="text-center">Login Now</h2>
          <form class="login-form" >
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-uppercase">Username</label>
      <input type="text" class="form-control" placeholder="">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Password</label>
      <input type="password" class="form-control" placeholder="">
    </div>
    
    
      <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input">
        <small>Remember Me</small>
      </label>
     <a routerLink="/dashboard"><button type="submit" class="btn btn-login float-right">Submit</button></a>
      </div>
    
  </form>
    </div>
    <div class="col-md-8 banner-sec">
      <img class="d-block img-fluid" src="assets/banner_top_002.jpg">
      </div>
      <div class="registerSec"><a routerLink="register">Create New Account</a></div>
    </div>
    </div>
    </section>
  </body>
</html>