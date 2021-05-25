<div>
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-md-3">
            <h2>Welcome {{ auth()->user()->name }}</h2>
            <small>You have {{ $users->count() }} users</small>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach ($users as $item)
            <div class="col-lg-4">
                <div class="contact-box">
                    <a class="row" href="#">
                        <div class="col-4">
                            <div class="text-center">
                                <img alt="image" class="rounded-circle m-t-xs img-fluid"
                                    src="https://ui-avatars.com/api/?background=random&name={{ $item->name}}">
                                <div class="m-t-xs font-bold">Technical Solver</div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h3><strong>{{ $item->name}}</strong></h3>
                            <p><i class="fa fa-map-marker"></i> Graha Merah Putih Lt4</p>
                            {{-- <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address> --}}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    @push('css')
    <!-- Toastr style -->
    <link href="{{ asset('vendor/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    @endpush

    @push('js')
    <!-- Toastr -->
    <script src="{{ asset('vendor/js/plugins/toastr/toastr.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('vendor/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Responsive Admin Theme', 'Welcome to Sisca Admin');

                }, 1300);

            });

    </script>
    @endpush
</div>
