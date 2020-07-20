@extends('layouts.store.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="exhibitionApp">
        <exhibition :Datas="{{ $productDatas }}" :authData="{{ $authData }}" :pageId={{0}}></exhibition>
    </div>

      {{-- ここからページネート --}}

      @php
        //表示ページ
        $pageColNum = 5;
        @endphp

      <div class="l_index__paginate">
        <ul  class="l_pagination__container u_display--center">

            @php
                //現在のページが総ページ数と同じかつ、総ページ数がページ表示数よりも多い場合、左にリンクを４つ表示する
                if ($currentPageNum  == $totalPageNum && $totalPageNum >= $pageColNum){
                    $minPageNum = $currentPageNum-4;
                    $maxPageNum = $currentPageNum;
                    //現在のページが総ページ数より１少ない場合、かつ総ページ数がページ表示数よりも多い場合、左にリンクを3つ、右にリンクを一つ表示
                }elseif ($currentPageNum  == ($totalPageNum-1) && $totalPageNum >= $pageColNum){
                    $minPageNum = $currentPageNum-3;
                    $maxPageNum = $currentPageNum+1;
                    //現在のページが２で、かつ総ページ数がページ表示数よりも多い場合、左にリンクを1つ、右にリンクを3つ表示
                }elseif (($currentPageNum  == 2 && $totalPageNum >= $pageColNum)){
                    $minPageNum = $currentPageNum-1;
                    $maxPageNum = $currentPageNum+3;
                    //現在のページが1の場合、かつ総ページ数がページ表示数よりも多い場合、右にリンクを4つ表示
                }elseif (($currentPageNum  == 1 && $totalPageNum >= $pageColNum)){
                    $minPageNum = $currentPageNum;
                    $maxPageNum = $currentPageNum+4;
                    //総ページ数が表示ページ数よりも小さい場合、最小表示ページ数に1、最大表示ページ数に総ページ数をいれる
                }elseif(($totalPageNum < $pageColNum )){
                    $minPageNum = 1;
                    $maxPageNum = $totalPageNum;
                    //それ以外は、左右にリンクを２ずつ表示する
                }else{
                    $minPageNum = $currentPageNum-2;
                    $maxPageNum = $currentPageNum+2;
                }
            @endphp
    
                {{-- 現在のページ数が１以外の時表示する --}}
                @if($currentPageNum != 1)
                        <a class="c_pagination__list--prev c_pagination__list--text" href="{{route('store.product.exhibition' , 1)}}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                @endif
    
                @for($i = $minPageNum; $i <= $maxPageNum; $i++)
                        <a  class="c_pagination__list--icon <?php if(($currentPageNum ) == $i ) echo "c_pagination--active" ?> c_pagination__list--text" href="{{route('store.product.exhibition' , $i )}}">
                            <?php echo $i ?>
                        </a>
                @endfor
    
                {{-- 現在のページ数が、最大ページ数以外の時表じする --}}
                @if ($currentPageNum != $maxPageNum)
                        <a  class="c_pagination__list--text c_pagination__list--next" href="{{route('store.product.exhibition' , $maxPageNum )}}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                @endif
        </ul>
    </div>
    {{-- ここでページネート END --}}

</div>
@endsection