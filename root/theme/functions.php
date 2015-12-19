<?php
 
# Get title for the webpage by concatenating page specific title with site-wide title.

# @param string $title for this page.
# @return string/null wether the favicon is defined or not.

function get_title($title) {
  	global $forest;
  	return $title . (isset($forest['title_append']) ? $forest['title_append'] : null);
}