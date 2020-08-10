{{-- Bootstrap JS --}}
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js" integrity="sha256-LlN0a0J3hMkDLO1mhcMwy+GIMbIRV7kvKHx4oCxNoxI=" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
<script type="text/javascript" src="{{ URL::asset('js/notifications.js') }}"></script>
<script>
    function changeTheme() {
        let theme = 'light';
        if(document.body.getAttribute('data-theme') !== 'dark') {
            theme = 'dark';
        }
        document.body.setAttribute('data-theme', theme);

        $.post('{{ route('change.theme') }}', {theme: theme}, function (data) {

        });

    }
</script>
