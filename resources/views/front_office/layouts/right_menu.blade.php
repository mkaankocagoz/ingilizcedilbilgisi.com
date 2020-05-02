<div class="col-lg-3 order-lg-2">
    <aside class="sidebar">
        <form action="#" method="get">
            <div class="input-group mb-3 pb-1">
                <input class="form-control text-1" placeholder="Ara..." name="s" id="s" type="text">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                </span>
            </div>
        </form>
        <h5 class="font-weight-bold pt-4">Kategoriler</h5>
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link" href="#">Gramer</a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/gramer/baslangic-seviye-gramer') }}">Başlangıç Seviye Gramer</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/gramer/orta-seviye-gramer') }}">Orta Seviye Gramer</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/gramer/ileri-seviye-gramer') }}">İleri Seviye Gramer</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kelime</a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kelime/yakin-anlamli-kelimeler') }}">Yakın Anlamlı Kelimeler</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kelime/baglaclar') }}">Bağlaçlar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kelime/onemli-fiiler') }}">Önemli Fiiler</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kelime/edatlar') }}">Edatlar</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/hikaye') }}">Hikaye</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
        </ul>
        <div class="tabs tabs-dark mb-4 pb-2">
            <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">En Çok Okunan</a></li>
                <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Son Konular</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="popularPosts">
                    <ul class="simple-post-list">
                        @if(isset($popular))
                            @foreach($popular as $item)
                                @php
                                    $page_id = $item->page_info->sub_page_id;
                                    if($page_id == 0){
                                        $kategoriAdi = $item->page_info->page_name_slug;
                                    }
                                    else{
                                        $page_infos = \App\Models\Page::find($page_id);
                                        $kategoriAdi = $page_infos->page_name_slug;
                                    }

                                    if($kategoriAdi == 'blog' || $kategoriAdi == 'hikaye')
                                        $item->page_info->page_name_slug = "";
                                    else
                                        $item->page_info->page_name_slug = $item->page_info->page_name_slug."/";
                                @endphp
                                <li>
                                    <div class="post-info">
                                        <a href="{{ url('/'.$kategoriAdi.'/'.$item->page_info->page_name_slug.$item->site_url) }}">{{ $item->title }}</a>
                                        <div class="post-meta">
                                            {{ date('m.d.Y', strtotime($item->created_at)) }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="tab-pane" id="recentPosts">
                    <ul class="simple-post-list">
                        @if(isset($recent))
                            @foreach($recent as $item)
                                @php
                                    $page_id = $item->page_info->sub_page_id;
                                    if($page_id == 0){
                                        $kategoriAdi = $item->page_info->page_name_slug;
                                    }
                                    else{
                                        $page_infos = \App\Models\Page::find($page_id);
                                        $kategoriAdi = $page_infos->page_name_slug;
                                    }

                                    if($kategoriAdi == 'blog' || $kategoriAdi == 'hikaye')
                                        $item->page_info->page_name_slug = "";
                                    else
                                        $item->page_info->page_name_slug = $item->page_info->page_name_slug."/";
                                @endphp
                                <li>
                                    <div class="post-info">
                                        <a href="{{ url('/'.$kategoriAdi.'/'.$item->page_info->page_name_slug.$item->site_url) }}">{{ $item->title }}</a>
                                        <div class="post-meta">
                                            {{ date('m.d.Y', strtotime($item->created_at)) }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
{{--        <h5 class="font-weight-bold pt-4">About Us</h5>--}}
{{--        <p>--}}
{{--            Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel.--}}
{{--            Nam dolor ligula, faucibus id sodales in, auctor fringilla libero.--}}
{{--        </p>--}}
    </aside>
</div>











