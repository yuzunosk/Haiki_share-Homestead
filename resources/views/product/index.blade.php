@extends('layouts.store.app')

@php
//表示ページ
$pageColNum = 5;
//GETされていなければ空を入れておく
$_GET['sort'] = (isset($_GET['sort'])) ?   $_GET['sort'] : "";
$_GET['order'] = (isset($_GET['order'])) ? $_GET['order'] : "";
@endphp

@section('content')
<div class="l_index__container">

    <div class="l_index__head">

        <h2 class="u_display--center u_font__text--title l_index__head--title">{{ __('Store Product List') }}</h2>

        <div class="l_index__head--sort u_display--end u_font__default">
            <p id="js-click-showSerch" class="btn--serch">並び替え<i class="fas fa-search fa-2x"></i></p>
        </div>
        <form method="GET" id="js-toggle-display" class="c_serch__container u_display-hide u_font__default"
            action="{{ route('store.product.index' , [ $currentPageNum, $_GET['sort'] , $_GET['order'] ]) }}">
            <button id="js-click-hideSerch" class="c_serch--close u_display--center" type="button">
                <i class="fas fa-times fa-sm"></i>
            </button>
            <h3 class="c_serch--head">並び替えメニュー</h3>
            <div class="c_serch--sort">
                {{-- カテゴリーからデータを取得してループ処理をする  --}}
                <select name="sort">
                    <option value=""         @if($sort == "id")       selected @endif>-選択して下さい-</option>
                    <option value="name"     @if($sort == "name")     selected @endif>-名前 50音順-</option>
                    <option value="category" @if($sort == "category") selected @endif>-カテゴリー順-</option>
                    <option value="price"    @if($sort == "price")    selected @endif>-値段順-</option>
                    <option value="sellby"   @if($sort == "sellby")   selected @endif>-Sellby-</option>
                </select>
            </div>
            <div class="c_serch--order">
                <select name="order">
                    <option value=""     @if($sort == "")      selected @endif>-選択して下さい-</option>
                    <option value="asc"  @if($order == "asc")  selected @endif>-昇順-</option>
                    <option value="desc" @if($order == "desc") selected @endif>-降順-</option>
                </select>
            </div>
            <input class="c_serch--submit btn--mini btn--purpule" type="submit" value="検索">
        </form>
    </div>
    
    <div id="cardApp" class="l_index__main">
        <productcardunit :productdatas="{{ $productDatas }}" :storeid="{{ $storeId }}" :buydatas="{{ $buyDatas }}" ></productcardunit>
    </div>

            {{-- ここからページネート --}}
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
                                <a class="c_pagination__list--prev c_pagination__list--text u_font__default" href="{{route('store.product.index' , [1 , $sort , $order])}}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                        @endif
            
                        @for($i = $minPageNum; $i <= $maxPageNum; $i++)
                                <a  class="c_pagination__list--icon <?php if(($currentPageNum ) == $i ) echo "c_pagination--active" ?> c_pagination__list--text u_font__default" href="{{route('store.product.index' ,[ $i , $sort , $order])}}">
                                    <?php echo $i ?>
                                </a>
                        @endfor
            
                        {{-- 現在のページ数が、最大ページ数以外の時表じする --}}
                        @if ($currentPageNum != $maxPageNum)
                                <a  class="c_pagination__list--text u_font__default c_pagination__list--next" href="{{route('store.product.index' , [$maxPageNum , $sort , $order])}}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                        @endif
                </ul>
            </div>
            {{-- ここでページネート END --}}

</div> @endsection