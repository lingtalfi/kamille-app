<?php




$item = $v['item'];

?>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top"
                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                 alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                 src="<?php echo $item['img']; ?>"
                 data-holder-rendered="true">
            <div class="card-body">
                <h2>{i:title}</h2>
                <p class="card-text">{i:text}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <a href="{i:linkBack}">Retour au blog</a>
</div>