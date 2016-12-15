 
 

 <!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Picnook'--}}
        @yield('title', 'Picnook')
    </title>

    <meta charset='utf-8'>
    
    <!-- Latest compiled and minified CSS -->
<!--<script src="https://use.fontawesome.com/ea0bd51253.js"></script>-->
<link href="/css/picnook.css" id="mainstyles" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
   

</head>
<body>
   
 

 
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
 

 

 
 
   <div id="welcomepage">
 <div id="welcomepagecontainer">
  <section>
  	<p>welcome to Picnook.</p>
  <p>to get started <a href="/login">login</a> or <a href="/register">register</a></p>
  </section>
</div>
 

</div> 
 
 

</body>
</html>
    
 

