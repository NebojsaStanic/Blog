<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="blog-nav-item active" href="#">Home</a>
      <a class="blog-nav-item" href="#">New features</a>
      <a class="blog-nav-item" href="#">Press</a>
      <a class="blog-nav-item" href="#">New hires</a>
      @if (auth()->check())
      	
      	<a class="blog-nav-item" href="#" >{{ auth()->user()->name}}</a>

      @endif
    </nav>

  </div>
</div>