<?php if((date('N') <= 5) && (date('G', strtotime(current_time('mysql'))) >= 9 && date('G', strtotime(current_time('mysql'))) <= 11) ) : ?>
<div class="listenLiveWidget widget-area only-desktop">
  <a id="listen-live" href="http://www.istook.com/f/live" target="_blank">Listen to Istook Live!</a>
</div>
<div style="clear:both;"></div>
<?php endif; ?>