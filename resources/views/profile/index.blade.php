@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('admin/media/photos/photo17@2x.jpg') }}');">
        <div class="bg-black-25">
            <div class="content content-full">
                <div class="py-5 text-center">
                    <img class="img-avatar img-avatar96 img-avatar-thumb"
                        src="{{ asset('admin/media/avatars/avatar10.jpg') }}" alt="">
                    <h1 class="fw-bold my-2 text-white">{{ Auth::user()->name }}</h1>
                    <h2 class="h4 fw-bold text-white-75">
                        Email: {{ Auth::user()->email }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    {{-- <div class="content content-full content-boxed">
        <!-- Latest Friends -->
        <h2 class="content-heading">
            <i class="si si-users me-1"></i> Latest Friends
        </h2>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-image"
                        style="background-image: url('assets/media/photos/photo15.jpg');">
                        <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Melissa Rice</div>
                        <div class="fs-sm text-muted">Product Designer</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-plus text-muted me-1"></i> Add
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-user-circle text-muted me-1"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-image"
                        style="background-image: url('assets/media/photos/photo4.jpg');">
                        <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar16.jpg" alt="">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">David Fuller</div>
                        <div class="fs-sm text-muted">Senior Developer</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-plus text-muted me-1"></i> Add
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-user-circle text-muted me-1"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-image"
                        style="background-image: url('assets/media/photos/photo1.jpg');">
                        <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Brian Stevens</div>
                        <div class="fs-sm text-muted">Junior Designer</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-plus text-muted me-1"></i> Add
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-user-circle text-muted me-1"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-image"
                        style="background-image: url('assets/media/photos/photo3.jpg');">
                        <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar2.jpg" alt="">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Judy Ford</div>
                        <div class="fs-sm text-muted">Marketing</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-plus text-muted me-1"></i> Add
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-user-circle text-muted me-1"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-alt-primary">
                Check out more <i class="fa fa-arrow-right ms-1"></i>
            </button>
        </div>
        <!-- END Latest Friends -->

        <!-- Latest Projects -->
        <h2 class="content-heading">
            <i class="si si-briefcase me-1"></i> Latest Projects
        </h2>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-info">
                        <div class="my-3">
                            <i class="fab fa-2x fa-windows text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Windows App</div>
                        <div class="fs-sm text-muted">Accounting Dashboard</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted me-1"></i> View Project
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-warning">
                        <div class="my-3">
                            <i class="fa fa-2x fa-mobile text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">iOS App</div>
                        <div class="fs-sm text-muted">Accounting Dashboard</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted me-1"></i> View Project
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-danger">
                        <div class="my-3">
                            <i class="fa fa-2x fa-globe text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Website Design</div>
                        <div class="fs-sm text-muted">https://example.com</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted me-1"></i> View Project
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-success">
                        <div class="my-3">
                            <i class="fa fa-2x fa-birthday-cake text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="fw-semibold">Special Icon Set</div>
                        <div class="fs-sm text-muted">3000 icons</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted me-1"></i> View Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-alt-primary">
                Check out more <i class="fa fa-arrow-right ms-1"></i>
            </button>
        </div>
        <!-- END Latest Projects -->

        <!-- Latest Posts -->
        <h2 class="content-heading">
            <i class="si si-note me-1"></i> Latest Posts
        </h2>
        <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <h4 class="fs-base text-primary mb-0">
                    <i class="fa fa-newspaper text-muted me-1"></i> 5 things I've learned working from home
                </h4>
                <p class="fs-sm text-muted mb-0 ms-2 text-end">
                    3 hours ago
                </p>
            </div>
        </a>
        <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <h4 class="fs-base text-primary mb-0">
                    <i class="fa fa-newspaper text-muted me-1"></i> Vue.js or React? Let’s dive in!
                </h4>
                <p class="fs-sm text-muted mb-0 ms-2 text-end">
                    2 days ago
                </p>
            </div>
        </a>
        <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <h4 class="fs-base text-primary mb-0">
                    <i class="fa fa-newspaper text-muted me-1"></i> 10 important things I wish I knew
                </h4>
                <p class="fs-sm text-muted mb-0 ms-2 text-end">
                    1 week ago
                </p>
            </div>
        </a>
        <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <h4 class="fs-base text-primary mb-0">
                    <i class="fa fa-newspaper text-muted me-1"></i> Bringing your productivity back
                </h4>
                <p class="fs-sm text-muted mb-0 ms-2 text-end">
                    2 weeks ago
                </p>
            </div>
        </a>
        <a class="block block-rounded block-link-shadow mb-3" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <h4 class="fs-base text-primary mb-0">
                    <i class="fa fa-newspaper text-muted me-1"></i> Creating a super smooth CSS animation
                </h4>
                <p class="fs-sm text-muted mb-0 ms-2 text-end">
                    1 month ago
                </p>
            </div>
        </a>
        <div class="text-end">
            <button type="button" class="btn btn-alt-primary">
                Check out more <i class="fa fa-arrow-right ms-1"></i>
            </button>
        </div>
        <!-- END Latest Posts -->
    </div> --}}
    <!-- END Page Content -->
@endsection
