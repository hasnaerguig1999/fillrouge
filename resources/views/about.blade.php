@extends('layouts.app')

@section('content')

<section class="showcase-area" id="showcase">
  <div class="showcase-container">
    <div class="showcase-content">
      <h1>Welcome to Our Website</h1>
      <p>Discover amazing products and services that will change your life</p>
      <a href="#" class="btn btn-primary">Shop Now</a>
    </div>
  </div>
</section>
<div class="container" id="con">
  <img src="../img/pexels-olasupo-john-11930775.jpg" alt="placeholder image" class="img-responsive">
  <div class="text-wrapper">
    <h2>Titre de l'article</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non orci eu urna tincidunt aliquam eu in urna. Aliquam vel turpis vitae elit aliquam suscipit eu vel lorem. Sed malesuada magna id urna aliquet, nec interdum lorem tincidunt.</p>
    <a href="#" class="btn btn-primary" id="aa">Lire la suite</a>
  </div>
</div>


<div class="container" id="con">

  <div class="text-wrapper">
    <h2>Titre de l'article</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non orci eu urna tincidunt aliquam eu in urna. Aliquam vel turpis vitae elit aliquam suscipit eu vel lorem. Sed malesuada magna id urna aliquet, nec interdum lorem tincidunt.</p>
    <a href="#" class="btn btn-primary" id="aa">Lire la suite</a>
  </div>
  <img src="../img/trendy-young-woman-jumping-pink-background-full-length-view-carefree-female-model-denim-outfit.jpg" alt="placeholder image" class="img-responsive">

</div>

<section class="features-area">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="feature-box">
          <i class="fa fa-cog"></i>
          <h3>Easy to Customize</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <i class="fa fa-rocket"></i>
          <h3>Fast &amp; Secure</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <i class="fa fa-heart"></i>
          <h3>Crafted with Love</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  #aa{
    background-color: black;
    border: #fff;
  }
  #con {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 50px;
}

.img-responsive {
  width: 100%;
  height: auto;
  max-width: 400px;
}

.text-wrapper {
  flex: 1;
  margin-left: 50px;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
}

p {
  font-size: 1rem;
  line-height: 1.5;
  margin-bottom: 20px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border-radius: 5px;
  text-decoration: none;
}

.btn:hover {
  background-color: #0062cc;
}

.showcase-area {
  width: 100%;
  height: 90vh;
  background:
    url("../img/1681829709pexels-marcelo-chagas-2229490.jpg");
  background-size: cover; 
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}

.showcase-content {
  text-align: center;
  color: #fff;
}

.showcase-content h1 {
  font-size: 4rem;
  margin-bottom: 1rem;
}

.showcase-content p {
  font-size: 1.5rem;
  margin-bottom: 2rem;
}

.btn-primary {
  background-color: #21D192;
  border-color: #21D192;
  font-size: 1.5rem;
  padding: 1rem 2rem;
}

.btn-primary:hover {
  background-color: #21D192;
  border-color: #21D192;
}

.features-area {
  padding: 4rem 0;
}

.feature-box {
  text-align: center;
  margin-bottom: 2rem;
}

.feature-box i {
  font-size: 3rem;
  color: #21D192;
  margin-bottom: 1rem;
}

.feature-box h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.feature-box p {
  font-size: 1rem;
  margin-bottom: 0;
}

@media only screen and (max-width: 768px) {
  .showcase-content h1 {
    font-size: 3rem;
  }
  .showcase-content p {
    font-size: 1.2rem;
  }
  .btn-primary {
    font-size: 1.2rem;
padding: 0.8rem 1.6rem;
}
.feature-box i {
font-size: 2.5rem;
}
.feature-box h3 {
font-size: 1.2rem;
}
.feature-box p {
font-size: 0.9rem;
}
}
</style>
@endsection