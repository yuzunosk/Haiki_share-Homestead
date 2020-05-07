<div class="d-flex justify-content-between bg-light text-center mb-5" style="font-size: 18px;letter-spacing:.1rem;height:50px;line-height:50px;">
    <span class="justify-content-start ml-2" style="letter-spacing:.1rem;">{{ $paginator->total() }}件のデータが見つかりました</span>

    <div class="mr-2 d-none d-md-block">
        <span>{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}件</span>/<span>{{ $paginator->total() }}件中</span>
    </div>
</div>

@if ($paginator->hasPages())
<ul class="pagination pagination-sm justify-content-end " role="navigation">
    {{-- First Page Link --}}
    <!-- 最初のページへのリンク -->
    <!-- <p class="btn btn-sm mr-1 border-dark text-dark" style="border-radius: 0;" disabled>Page{{ $paginator->firstItem() }} of {{ $paginator->lastItem() }}</p> -->
    <li class="d-none d-md-block page-item {{ $paginator->onFirstPage() ? 'd-none' : '' }}">
        <a class="text-dark page-link" href="{{ $paginator->url(1) }}">&laquo; Prev</a>
    </li>

    {{-- Previous Page Link --}}
    <!-- 前のページへのリンク -->
    <li class="page-item mx-1 {{ $paginator->onFirstPage() ? 'd-none' : '' }}">
        <a class="text-dark page-link" href="{{ $paginator->previousPageUrl() }}">&lt;</a>
    </li>

    {{-- Pagination Elemnts --}}
    {{-- Array Of Links --}}
    {{-- 定数よりもページ数が多い時 --}}
    @if ($paginator->lastPage() > config('const.PAGINATE.LINK_NUM'))

    {{-- 現在ページが表示するリンクの中心位置よりも左の時 --}}
    @if ($paginator->currentPage() <= floor(config('const.PAGINATE.LINK_NUM') / 2)) <?php $start_page = 1; ?> <?php $end_page = config('const.PAGINATE.LINK_NUM'); ?> {{-- 現在ページが表示するリンクの中心位置よりも右の時 --}} @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(config('const.PAGINATE.LINK_NUM') / 2))
        <?php $start_page = $paginator->lastPage() - (config('const.PAGINATE.LINK_NUM') - 1); ?>
        <?php $end_page = $paginator->lastPage(); ?>

        {{-- 現在ページが表示するリンクの中心位置の時 --}}
        @else
        <?php $start_page = $paginator->currentPage() - (floor((config('const.PAGINATE.LINK_NUM') % 2 == 0 ? config('const.PAGINATE.LINK_NUM') - 1 : config('const.PAGINATE.LINK_NUM'))  /  2)); ?>
        <?php $end_page = $paginator->currentPage() + floor(config('const.PAGINATE.LINK_NUM') / 2); ?>
        @endif

        {{-- 定数よりもページ数が少ない時 --}}
        @else
        <?php $start_page = 1; ?>
        <?php $end_page = $paginator->lastPage(); ?>
        @endif

        {{-- 処理部分 --}}
        @for ($i = $start_page; $i <= $end_page; $i++) @if ($i==$paginator->currentPage())
            <li class="page-item active mr-1"><span class="page-link">{{ $i }}</span></li>
            @else
            <li class="page-item mr-1"><a class="text-dark page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>

            @endif
            @endfor

            <!-- それぞれのページへのリンク -->

            {{-- Next Page Link --}}
            <li class="page-item mr-1 {{ $paginator->currentPage() == $paginator->lastPage() ? 'd-none' : '' }}">
                <a class="text-dark page-link" href="{{ $paginator->nextPageUrl() }}">&gt;</a>
            </li>

            {{-- Last Page Link --}}
            <li class="d-none d-md-block page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'd-none' : '' }}">
                <a class="text-dark page-link" href="{{ $paginator->url($paginator->lastPage()) }}">Last &raquo;</a>
            </li>
</ul>
@else
<div class="text-right">
    <span class="bg-primary p-2 text-white">only page</span>
</div>
@endif