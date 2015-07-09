{{-- Breadcrumbs --}}
<div class="header-content">
    <h2><i class="{{ isset($icon) ? $icon : 'fa fa-table' }}"></i> {{$headerTitle}} <span> {{$subTitle}}</span></h2>
    <div class="breadcrumb-wrapper hidden-xs">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/dashboard">Dashboard</a>
            </li>
            @if( !is_array($currentPage))
                <i class="fa fa-angle-right"></i>
                <li class="active">{{$currentPage}}</li>
            @else
                @foreach($currentPage as $pageName => $page)
                    <i class="fa fa-angle-right"></i>
                    @if(isset($page['url']))
                        <li class="{{isset($page['isCurrentPage']) ? 'active' : ''}}"><a href="{{$page['url']}}">{{$pageName}}</a></li>
                    @else
                        <li class="{{isset($page['isCurrentPage']) ? 'active' : ''}}">{{$pageName}}</li>
                    @endif

                @endforeach
            @endif
        </ol>
    </div><!-- /.breadcrumb-wrapper -->
</div>
{{-- End of Breadcrumbs --}}