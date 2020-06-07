@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Product List') }}</h2>

    <div>

        {{-- ここからページネート --}}
        <div class="l_pagination__container">
            <ul class="c_pagination__list">

                @php
                    //表示ページ数
                    $pageColNum = 5;
                    //GETされていなければ空を入れておく
                    $_GET['sort'] = (isset($_GET['sort'])) ?   $_GET['sort'] : "";
                    $_GET['order'] = (isset($_GET['order'])) ? $_GET['order'] : "";
        
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
                        <li class="c_pagination__list--item">
                            <a  href="{{route('store.product.index' , [1 , $sort , $order])}}">&lt;</a>
                        </li>
                    @endif
        
                    @for($i = $minPageNum; $i <= $maxPageNum; $i++)
                        <li class="c_pagination__list--item <?php if(($currentPageNum +1) == $i ) echo "active" ?>">
                            <a href="{{route('store.product.index' ,[ $i , $sort , $order])}}">
                                <?php echo $i ?>
                            </a>
                        </li>
                    @endfor
        
                    {{-- 現在のページ数が、最大ページ数以外の時表じする --}}
                    @if ($currentPageNum != $maxPageNum)
                        <li class="c_pagination__list--item">
                            <a href="{{route('store.product.index' , [$maxPageNum , $sort , $order])}}">&gt;</a>
                        </li>
                    @endif
        
            </ul>
        </div>
        {{-- ここからページネート END --}}



        <form method="GET"
        action="{{ route('store.product.index' , [ $currentPageNum, $_GET['sort'] , $_GET['order'] ]) }}">
            <div>
                {{-- カテゴリーからデータを取得してループ処理をする  --}}
                <select name="sort">
                    <option value=""         @if($sort == "id")       selected @endif>-選択して下さい-</option>
                    <option value="name"     @if($sort == "name")     selected @endif>-Name-</option>
                    <option value="category" @if($sort == "category") selected @endif>-Category-</option>
                    <option value="price"    @if($sort == "price")    selected @endif>-Price-</option>
                    <option value="sellby"   @if($sort == "sellby")   selected @endif>-Sellby-</option>
                </select>
            </div>

            <div>
                <select name="order">
                    <option value=""     @if($sort == "")      selected @endif>-選択して下さい-</option>
                    <option value="asc"  @if($order == "asc")  selected @endif>-昇順-</option>
                    <option value="desc" @if($order == "desc") selected @endif>-降順-</option>
                </select>
            </div>

            <input type="submit" value="並び替える">
        </form>

    </div>

    <div id="cardApp">
        <productcardunit :productdatas="{{ $productDatas }}"></productcardunit>
    </div>
</div> @endsection