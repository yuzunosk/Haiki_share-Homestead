<div class="l_pagination__container">
    <ul class="c_pagination__list">
        @php
            $pageColNum = 5;

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
                    <a href="?p=1">&lt;</a>
                </li>
            @endif

            @for($i = $minPageNum; $i <= $maxPageNum; $i++)

                <li class="c_pagination__list--item @if($currentPageNum = $i) echo 'active' @endif ">
                    <a href="?p=@php echo $i @endphp">
                        @php echo $i @endphp
                    </a>
                </li>
            @endfor


            //現在のページ数が、最大ページ数以外の時表じする
            @if($currentPageNum != $maxPageNum)
                <li class="c_pagination__list--item">
                    <a href="?p=1">&gt;</a>
                </li>
            @endif


    </ul>

</div>