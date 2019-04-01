</section>
	
</article>
	
	
<footer id="pageFooter">
	 
	 <article class="content">
    <div id="socialmedia">
      <ul class="group">
        <li><a href="https://twitter.com/"><img class="icon-twitter" src="_images/twitter.png" alt="icon for twitter" /></a></li>
        <li><a href="http://www.facebook.com/"><img class="icon-facebook" src="_images/facebook.png" alt="icon for facebook" /></a></li>
        <li><a href="http://www.youtube.com/"><img class="icon-youtube" src="_images/youtube.png" alt="icon for youtube" /></a></li>    
      </ul>      
    </div>
  </article>
  
	 
	  <p class="notice">&copy; 2017 Diversity United </p>
	</footer>
			  <script src="_scripts/modernizr.custom.js"></script>
			<script>
			//use the modernizr load to load up external scripts. 
			Modernizr.load([
			{
				load: [  
					'http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js',
					'_scripts/respondnav.js'  
				]
			},
			{
				// test for media query support, if not load respond.js
				test : Modernizr.mq('only all'),
				// If not, load the respond.js file
				nope : '/_scripts/respond.js' 
			}
			]); 
			
				
				var slideIndex = 1;
				showDivs(slideIndex);

				function plusDivs(n) {
				  showDivs(slideIndex += n);
				}

				function showDivs(n) {
				  var i;
				  var x = document.getElementsByClassName("mySlides");
				  if (n > x.length) {slideIndex = 1}    
				  if (n < 1) {slideIndex = x.length}
				  for (i = 0; i < x.length; i++) {
					 x[i].style.display = "none";  
				  }
				  x[slideIndex-1].style.display = "block";  
				}
				
			</script>
</body>
</html>