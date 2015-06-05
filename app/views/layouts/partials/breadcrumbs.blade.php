{{-- Breadcrumbs --}}
<div class="header-content">
    <h2><i class="{{ isset($icon) ? $icon : 'fa fa-table' }}"></i> {{$headerTitle}} <span> {{$subTitle}}</span></h2>
    <div class="breadcrumb-wrapper hidden-xs">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/dashboard">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li class="active">{{$currentPage}}</li>
        </ol>
    </div><!-- /.breadcrumb-wrapper -->
</div>
{{-- End of Breadcrumbs --}}