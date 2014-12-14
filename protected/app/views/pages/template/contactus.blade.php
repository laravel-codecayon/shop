@if(Session::has('message_contact'))
         {{ Session::get('message_contact') }}
    @endif
    <ul class="parsley-error-list">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
<div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » <a href="">Contact Us</a> </div>
      <!--Breadcrumb Part End-->
      <h1>Contact Us</h1>
      <h2>Our Location</h2>
      <div class="contact-info">
        <div class="content">
          <div class="left">
            <h4><b>Address:</b></h4>
            <p>{{CNF_ADDRESS}}</p>
          </div>
          <div class="right">
            <h4><b>Telephone:</b></h4>
            {{CNF_PHONE}}<br>
            <br>
          </div>
        </div>
      </div>
      <h2>Contact Form</h2>
      <form method="post" action="{{URL::to('')}}/home/contactform">
      <div class="content">Name <b>:</b><font color="red">(*)</font><br>
        <input class="large-field" type="text" value="{{$input['name']}}" name="name">
        <br>
        <br>
        <b>E-Mail Address:</b><font color="red">(*)</font><br>
        <input class="large-field" type="text" value="{{$input['email']}}" name="email">
        <br>
        <br>
        <b>Phone:</b><font color="red">(*)</font><br>
        <input class="large-field" type="text" value="{{$input['phone']}}" name="phone">
        <br>
        <br>
        <b>Subject:</b><font color="red">(*)</font><br>
        <input class="large-field" type="text" value="{{$input['subject']}}" name="subject">
        <br>
        <br>
        <b>Content:</b><font color="red">(*)</font><br>
        <textarea style="width: 98%;" rows="10" cols="40" name="content">{{$input['content']}}</textarea>
        <br>
        <br>
        <b>Security:</b><font color="red">(*)</font><br>
         @if(CNF_RECAPTCHA =='true') 

          {{ Form::captcha(array('theme' => 'white')); }}

        @endif
      </div>
      <div class="buttons">
        <div class="right">
          <input type="submit" class="button" value="Continue">
        </div>
      </div>
    </form>
    </div>