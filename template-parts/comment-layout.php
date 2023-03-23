<h3 class="page-title">
    <i class="material-icons">&#xE24C;</i>
    <span class="material-text">
       Comments
    </span>
</h3>
<div class="comment-wrapper">
  <div id="disqus_thread"></div>
    <script>
    var disqus_config = function () {
        this.page.url = '<?php echo get_permalink(); ?>';
        this.page.identifier = '<?php echo the_ID(); ?>';
        };

    (function(){ 
    var d = document, s = d.createElement('script');
    s.src = '//downloadhub.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>                          
    <script id="dsq-count-scr" src="//downloadhub.disqus.com/count.js" async></script>
</div>