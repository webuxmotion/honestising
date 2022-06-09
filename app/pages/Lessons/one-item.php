<div class="p-one-item js-one-item-page">
    <?php if (isUser()): ?>
        <a 
            href="/lessons/toggle-pin/<?=getParam($item, 'id')?>"
            class="p-one-item__top-control <?=getParam($item,'has_pin') ? 'is-active' : ''?>"
        >
            <?=icon('pin-color')?>
            <?=getParam($item, 'has_pin') ? 'Unpin' : 'Pin'?>
        </a>

        <a 
            href="/lessons/toggle-done/<?=getParam($item, 'id')?>"
            class="p-one-item__top-control <?=getParam($item, 'has_done') ? 'is-active' : ''?>"
        >
            <?=icon('check-color')?>
            <?=getParam($item, 'has_done') ? 'Unfinish' : 'Finish'?>
        </a>
    <?php endif; ?>
    <h1><?=getParam($item, 'title')?></h1>
    <?=$content?>
</div>

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
        this.page.url = "<?=baseUrl()?>lessons/<?=getParam($item, 'slug')?>";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "<?=getParam($item, 'slug')?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://honestising.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>


<?=$this->component('go-top-button')?>
