<?php
    get_header(); 
?>

<?php
    get_sidebar('left'); 
?>

<article class="content">
   
 
<section>
  <h2>Star Wars Celebration 2015 Announced</h2>
  <center><img src="anaheimce.png" width="200" height="113"  alt="" style="border:1px solid #1472ba;margin-bottom:5px;"/></center>
  
<h5>Posted by <a href="">Aaron</a> on July 21, 2013 at 04:06 PM CST:</h5>
  <p>At the end of Star Wars Celebration Europe's closing ceremonies this weekend, Lucasfilm officially announced the details of its next official convention: Star Wars Celebration 2015 will be held in Anaheim, California, from April 16-19, 2015. Timed with the release of Star Wars: Episode VII, this promises to be a Star Wars Celebration like no other.</p>
</section>
    <section>
      <h2>Clearing Method</h2>
      
      <h5>Posted by <a href="">Aaron</a> on July 21, 2013 at 04:06 PM CST:</h5>
      <p>Because all the columns are floated, this layout uses a clear:both declaration in the footer rule.  This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If your design requires you to remove the footer from the .container, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect. </p>
    </section>
    <section>
      <h2>Logo Replacement</h2>
      <h5>Posted by <a href="">Aaron</a> on July 21, 2013 at 04:06 PM CST:</h5>
      <p>An image placeholder was used in this layout in the header where you'll likely want to place  a logo. It is recommended that you remove the placeholder and replace it with your own linked logo. </p>
      <p> Be aware that if you use the Property inspector to navigate to your logo image using the SRC field (instead of removing and replacing the placeholder), you should remove the inline background and display properties. These inline styles are only used to make the logo placeholder show up in browsers for demonstration purposes. </p>
      <p>To remove the inline styles, make sure your CSS Styles panel is set to Current. Select the image, and in the Properties pane of the CSS Styles panel, right click and delete the display and background properties. (Of course, you can always go directly into the code and delete the inline styles from the image or placeholder there.)</p>
    </section>
        <section>
      <h2>Clearing Method</h2>
      
      <h5>Posted by <a href="">Aaron</a> on July 21, 2013 at 04:06 PM CST:</h5>
      <p>Because all the columns are floated, this layout uses a clear:both declaration in the footer rule.  This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If your design requires you to remove the footer from the .container, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect. </p>
    </section>
  <!-- end .content --></article>



<?php
    get_sidebar('right'); 
?>

<?php 
    get_footer(); 
?>