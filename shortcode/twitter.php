<?php
/*
*use [mytwitter] in content

*/
add_shortcode('mytwitter', 'mk_twitter');

function mk_twitter() {
    return '<a href="http://twitter.com/muriithi">@muriithi</a>';
}

?>