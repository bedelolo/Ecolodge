<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
            </span>
        </div><!-- /input-group -->
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget author_widget">
        <img class="author_img rounded-circle" src="{{ asset('img/blog/author.png') }}" alt="">
        <h4>Koffi Mensah</h4>
        <p>Guide Nature & Culture</p>
        <div class="social_icon">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <p>Passionné par la biodiversité du Bénin, je partage avec vous les secrets de notre lagune et les traditions de nos villages. Bienvenue chez nous !</p>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Articles Récents</h3>
        @if(isset($recent_posts))
            @foreach($recent_posts as $recent)
            <div class="media post_item">
                <img src="{{ asset($recent->image) }}" alt="post" style="width: 100px; height: 60px; object-fit: cover;">
                <div class="media-body">
                    <a href="{{ route('blog.show', $recent->slug) }}">
                        <h3>{{ $recent->title }}</h3>
                    </a>
                    <p>{{ $recent->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
        @endif
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget ads_widget">
        <a href="#"><img class="img-fluid" src="{{ asset('img/blog/add.jpg') }}" alt=""></a>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Catégories</h4>
        <ul class="list cat-list">
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Culture</p>
                    <p>37</p>
                </a>
            </li>
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Nature</p>
                    <p>24</p>
                </a>
            </li>
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Gastronomie</p>
                    <p>59</p>
                </a>
            </li>
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Activités</p>
                    <p>29</p>
                </a>
            </li>
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Écotourisme</p>
                    <p>15</p>
                </a>
            </li>
            <li>
                <a href="#" class="d-flex justify-content-between">
                    <p>Hébergement</p>
                    <p>09</p>
                </a>
            </li>
        </ul>
        <div class="br"></div>
    </aside>
    <aside class="single-sidebar-widget newsletter_widget">
        <h4 class="widget_title">Newsletter</h4>
        <p>
            Restez informé de nos offres spéciales et des actualités de l'éco-lodge.
        </p>
        <div class="form-group d-flex flex-row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Votre email"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre email'">
            </div>
            <a href="#" class="bbtns">S'abonner</a>
        </div>
        <p class="text-bottom">Désinscription à tout moment</p>
        <div class="br"></div>
    </aside>
    <aside class="single-sidebar-widget tag_cloud_widget">
        <h4 class="widget_title">Mots-clés</h4>
        <ul class="list">
            <li><a href="#">Bénin</a></li>
            <li><a href="#">Voyage</a></li>
            <li><a href="#">Écologie</a></li>
            <li><a href="#">Plage</a></li>
            <li><a href="#">Cuisine</a></li>
            <li><a href="#">Détente</a></li>
            <li><a href="#">Culture</a></li>
            <li><a href="#">Safari</a></li>
            <li><a href="#">Aventure</a></li>
        </ul>
    </aside>
</div>
