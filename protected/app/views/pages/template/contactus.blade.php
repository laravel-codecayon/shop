<div class="wrapper-header ">
    <div class=" container">
		<div class="col-sm-6 col-xs-6">
		  <div class="page-title">
			<h3> Contact Us <small> Layout sample I </small></h3>
		  </div>
		</div>
		<div class="col-sm-6 col-xs-6 ">
		  <ul class="breadcrumb pull-right">
			<li><a href="{{ URL::to('') }}">Home</a></li>
			<li class="active">About Us </li>
		  </ul>		
		</div>
		  
    </div>
</div>

<div class="wrapper-container container">
	<div class="row">
		
		<div class="col-md-6">
		 <h3> Send your message <small> Fill all form to get in touch</small></h3>
{{ Form::open(array('url'=>'home/contactform', 'class'=>'form-vertical','parsley-validate'=>'','novalidate'=>' ')) }}
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
		
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>

		 <div class="form-group  ">
		<label for="ipt"> Your Name</label>
		  {{ Form::text('name', null,array('class'=>'form-control', 'placeholder'=>'', 'required'=>'Your Name'  )) }} 
		
	  </div> 			
						 					
	  <div class="form-group  ">
		<label for="ipt"> Your Email</label>
		
		  {{ Form::text('sender', null,array('class'=>'form-control', 'placeholder'=>'', 'required'=>'email'  )) }} 
		
	  </div> 					
	  <div class="form-group  ">
		<label for="ipt"> Subject </label>
		
		  {{ Form::text('subject', null,array('class'=>'form-control', 'placeholder'=>'Subject', 'required'=>'true'   )) }} 
		 
	  </div> 					
	  <div class="form-group  ">
		<label for="ipt"> Message </label>	
		{{ Form::textarea('message',null,array('class'=>'form-control', 'placeholder'=>'Type your message here', 'required'=>'true'   )) }}		 
	  </div>
	  <div class="form-group  ">
		<button type="submit" class="btn btn-primary ">  Send Form </button>		 
	  </div>
	  <input name="redirect" value="contact-us" type="hidden">	  
  
{{ Form::close() }}		
		</div>
		
		<div class="col-md-6 ">
		<h3> Contact Information <small> Come to visit us  Find our address </small></h3>

			<p>2011 Main St
New York, NY 10044
Tel: 123-456-2000
Fax: 123-456-2200
Email: info@freshbizdemo.com
Web: www.mnkystudio.com</p>
<h3> Social Media <small> Follow Us </small></h3>
		<div class="team-social"> 
			<a class="btn btn-rounded btn-warning btn-icon" title="RSS" href="#"><i class="fa fa-rss"></i></a> 
			<a class="btn btn-rounded btn-info btn-icon" title="Twitter" href="#"><i class="fa fa-twitter"></i></a> 
			<a class="btn btn-rounded btn-primary btn-icon" title="Facebook" href="#"><i class="fa fa-facebook"></i></a> 
			<a class="btn btn-rounded btn-danger btn-icon" title="Google+" href="#"><i class="fa fa-google-plus"></i></a> 
			<a class="btn btn-rounded btn-info btn-icon" title="LinkedIn" href="#"><i class="fa fa-linkedin"></i></a> 
		</div>	
<h3> Goole Location  <small> Come to visit us  Find our address </small></h3>
<iframe style="margin-bottom:-5px;" src="http://maps.google.com/maps?q=5%2C+Wall+street%2C+New+York&iwloc=near&output=embed" class="su-gmap" width="100%" frameborder="0" height="240"></iframe>

		
		</div>
	
	</div>	
</div>

