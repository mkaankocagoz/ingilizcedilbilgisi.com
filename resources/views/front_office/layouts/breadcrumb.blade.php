<section class="page-header page-header-classic">
    <div class="container">
        @if(!isset($not_found))
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Anasayfa</a></li>

                        @if($site_url == 'blog' || $site_url == 'hikaye')
                            <li class="active">{{ $page->page_name }}</li>
                        @else
                            <li class="active">{{ $categoryName }}</li>
                            @if(isset($article))
                                <li class="active"><a style="color: #fbfbfb;" href="{{ url('/'.\Str::slug($categoryName).'/'.$sub_url) }}">{{ $page->page_name }}</a></li>
                            @endif
                        @endif

                    </ul>
                </div>
            </div>

            @if(isset($article))
                <div class="row">
                    <div class="col p-static">
                        <span class="page-header-title-border visible" style="width: 166.453px;"></span><h1 data-title-border="">{{ $article->title }}</h1>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col p-static">
                        <span class="page-header-title-border visible" style="width: 166.453px;"></span><h1 data-title-border="">{{ $page->page_name }}</h1>
                    </div>
                </div>
            @endif
        @else
            <div class="row">
                <div class="col">
                </div>
            </div>
        @endif
    </div>
</section>
