<footer id="site-footer">
     <span>
        {{ $sys_config['web_record'] }} |
    </span>
    {{ $sys_config['web_copyright'] }}
    <a href="{{ $sys_config['web_github'] }}" rel="nofollow" target="_blank" title="GitHub">
        <i aria-hidden="true" class="fa fa-github">
        </i>
    </a>
</footer>
<script>
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
</script>