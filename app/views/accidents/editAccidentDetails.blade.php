<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Accident Management :: Update Accident Details></title>
  @include('general/head')
</head>

<body>
  <div id="main">

  <div id="menubar">
    <div id="welcome">
      <h1><a href="#">Welcome To IDb</a></h1>
    </div><!--close welcome-->
      <div id="menu_items">
      <ul id="menu">
        <li><a href="{{URL::route('welcome')}}">Home</a></li>
        <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
        <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
        <li class="current" ><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
        <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
        <li><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
      </ul>
      </div><!--close menu-->
    </div><!--close menubar-->  
    
  <div id="site_content">   

    <div id="banner_image">
      <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content">
        <div class="content_item">
      <h1 class="down_title">Accident Management :: Update Accident Details </h1> 
        <em>In this section of idb, you get to input information about cars you insure</em> 
        
        <p style="display:inline;" class="returned-with"> 
            
          <ul>
            @if(Session::has('success'))
            <li class="error">{{ Session::get('success'); }}</li>
            @endif
            @if(Session::has('error'))
            <li class="success">{{ Session::get('error'); }}</li>
            @endif
            @if(Session::has('info'))
            <li class="info">{{ Session::get('info'); }}</li>
            @endif
          </ul>
        </p>

        <center><div id="wrapper">
          <h3><em>Edit Accident Info </em></h3>
          {{ Form::open(array('route' => 'commitEditedAccident')) }}
                 
                      <label>Date of Accident</label><br> 
                      
                      <input value='{{ $accidents->date  }}' type="date" name="date"><br>
                      <label>Location of Accident</label><br>
                        <input value='{{ $accidents->location  }}' type="text" name="location" ><br>
                  <input type="hidden" value="{{$accidents->reportNumber}}" name="reportNumber">
                  <button type="submit" name="createUserSubmit" 
                  onclick="return validateInputs()" value="save" class="submitt">Update
                  </button>
                {{ Form::close() }}
        </div>   </center>         
    </div><!--close content_item-->
      </div><!--close content-->   

  @include('general/footer')  

  </div><!--close site_content--> 
  
  </div><!--close main-->
  
  <div id="footer">
    Powered by <em><a href="">_ _ 3 c h 3 1 0 n _ _</a></em>
  </div><!--close footer-->  
  
</body>
</html>
