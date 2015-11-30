@if (Session::has('flash_notification.message'))
    <div class="alert alert-single alert-{{ Session::get('flash_notification.level') }}">
        <button class="close" data-dismiss="alert">×</button>
        <h5 class="alert-heading">
            @if (Session::get('flash_notification.level') == 'danger')
                {{--Change Danger to Error--}}
                Error!
            @else
                {{ ucfirst(Session::get('flash_notification.level')) }}!
            @endif
        </h5>
        {{ Session::get('flash_notification.message') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-error">
        <button class="close" data-dismiss="alert">×</button>
        <h5 class="alert-heading">Errors!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (!Session::has('flash_notification.important'))
    <script>
        setTimeout(function() {
            $('.alert-single').slideUp();
        }, 2000);
    </script>
@endif

