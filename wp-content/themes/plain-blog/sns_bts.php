<?php

public function get_prev_post_url(){

  $url = get_previous_post_link();
  $url = get_url_in_content($url);

  return $url;

}

public function get_next_post_url(){

  $url = get_next_post_link();
  return get_url_in_content($url);

}

public function echo_prev_post_btn(){

  $url = get_prev_post_url();

  if($url == NULL){
    echo "<div class=""poti"">⬅ 前の記事はありません</div>";
  }else{
    echo "<a href=""".$url."""><div class=""poti"">⬅ 前の記事を見る</div></a>";
  }

}

public function echo_next_post_btn(){

  $url = get_next_post_url();

  if($url == NULL){
    echo "<div class=""poti"">次の記事はありません ➡</div>";
  }else{
    echo "<a href=""".$url."""><div class=""poti"">次の記事を見る ➡</div></a>";
  }

}

?>

<div class="sns_bts">


<div class="sns_bts_cs">
<?php echo_prev_post_btn(); ?>
</div>

<div class="sns_bts_cs">
<a href="https://twitter.com/share" class="twitter-share-button" data-via="pan_nyaa" data-count="none" data-dnt="true">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>

<div class="sns_bts_cs">
<a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
</div>

<div class="sns_bts_cs">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://panyaa.lv9.org" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
</div>           

<div class="sns_bts_cs">
<?php echo_prev_next_btn(); ?>
</div>

	</div>              
                
